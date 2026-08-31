<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminProductTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('public');
    }

    public function test_admin_products_page_requires_authentication(): void
    {
        $response = $this->get('/admin/products');

        $response->assertRedirect('/login');
    }

    public function test_authenticated_admin_can_view_products_index(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/admin/products');

        $response->assertOk();
    }

    public function test_admin_can_create_product(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/admin/products', [
            'name' => 'Meter Air Digital 1',
            'category' => 'Water Meter',
            'short_description' => 'Deskripsi singkat produk baru',
            'description' => 'Deskripsi detail produk baru',
            'specifications' => "Ukuran: 1 inch\nTekanan: 10 bar",
            'is_featured' => true,
        ]);

        $response->assertRedirect(route('admin.products.index'));
        $this->assertDatabaseHas('products', [
            'name' => 'Meter Air Digital 1',
            'category' => 'Water Meter',
            'is_featured' => true,
        ]);
    }

    public function test_admin_can_update_product(): void
    {
        $user = User::factory()->create();
        $product = Product::create([
            'name' => 'Meter Air Lama',
            'slug' => 'meter-air-lama',
            'category' => 'Water Meter',
            'short_description' => 'Deskripsi lama',
            'description' => 'Detail lama',
            'specifications' => ['Ukuran' => '1 inch'],
            'is_featured' => false,
        ]);

        $response = $this->actingAs($user)->put("/admin/products/{$product->id}", [
            'name' => 'Meter Air Baru',
            'category' => 'Flow Meter',
            'short_description' => 'Deskripsi baru',
            'description' => 'Detail baru',
            'specifications' => "Ukuran: 2 inch\nTekanan: 20 bar",
            'is_featured' => true,
        ]);

        $response->assertRedirect(route('admin.products.index'));
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Meter Air Baru',
            'category' => 'Flow Meter',
            'is_featured' => true,
        ]);
    }

    public function test_admin_can_delete_product(): void
    {
        $user = User::factory()->create();
        $product = Product::create([
            'name' => 'Meter Air Untuk Dihapus',
            'slug' => 'meter-air-untuk-dihapus',
            'category' => 'Water Meter',
            'short_description' => 'Akan dihapus',
            'description' => 'Akan dihapus',
            'specifications' => ['Ukuran' => '1 inch'],
            'is_featured' => false,
        ]);

        $response = $this->actingAs($user)->delete("/admin/products/{$product->id}");

        $response->assertRedirect(route('admin.products.index'));
        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }

    public function test_admin_can_upload_product_image(): void
    {
        $user = User::factory()->create();
        $image = UploadedFile::fake()->create('product.jpg', 500, 'image/jpeg');

        $response = $this->actingAs($user)->post('/admin/products', [
            'name' => 'Meter dengan Gambar',
            'category' => 'Water Meter',
            'short_description' => 'Produk dengan gambar',
            'description' => 'Detail produk',
            'specifications' => 'Ukuran: 1 inch',
            'image' => $image,
            'is_featured' => false,
        ]);

        $response->assertRedirect(route('admin.products.index'));
        $product = Product::latest()->first();
        $this->assertNotNull($product->image_path);
        Storage::disk('public')->assertExists($product->image_path);
    }

    public function test_admin_can_upload_product_video(): void
    {
        $user = User::factory()->create();
        $video = UploadedFile::fake()->create('product.mp4', 1000, 'video/mp4');

        $response = $this->actingAs($user)->post('/admin/products', [
            'name' => 'Meter dengan Video',
            'category' => 'Flow Meter',
            'short_description' => 'Produk dengan video',
            'description' => 'Detail produk',
            'specifications' => 'Tekanan: 10 bar',
            'video' => $video,
            'is_featured' => false,
        ]);

        $response->assertRedirect(route('admin.products.index'));
        $product = Product::latest()->first();
        $this->assertNotNull($product->video_path);
        Storage::disk('public')->assertExists($product->video_path);
    }

    public function test_admin_product_image_validation(): void
    {
        $user = User::factory()->create();
        // Membuat file yang terlalu besar (lebih dari 5MB yang diijinkan)
        $largeImage = UploadedFile::fake()->create('huge.jpg', 6000);

        $response = $this->actingAs($user)->from('/admin/products/create')
            ->post('/admin/products', [
                'name' => 'Meter dengan Gambar Besar',
                'category' => 'Water Meter',
                'short_description' => 'Deskripsi',
                'description' => 'Detail',
                'specifications' => 'Spec',
                'image' => $largeImage,
                'is_featured' => false,
            ]);

        $response->assertSessionHasErrors('image');
    }

    public function test_admin_product_video_validation(): void
    {
        $user = User::factory()->create();
        // File bukan video
        $notVideo = UploadedFile::fake()->create('notavideo.txt', 100, 'text/plain');

        $response = $this->actingAs($user)->from('/admin/products/create')
            ->post('/admin/products', [
                'name' => 'Meter dengan File Salah',
                'category' => 'Water Meter',
                'short_description' => 'Deskripsi',
                'description' => 'Detail',
                'specifications' => 'Spec',
                'video' => $notVideo,
                'is_featured' => false,
            ]);

        $response->assertSessionHasErrors('video');
    }

    public function test_admin_can_update_product_image(): void
    {
        $user = User::factory()->create();
        $product = Product::create([
            'name' => 'Meter Lama',
            'slug' => 'meter-lama',
            'category' => 'Water Meter',
            'short_description' => 'Deskripsi',
            'description' => 'Detail',
            'specifications' => ['Ukuran' => '1 inch'],
            'is_featured' => false,
        ]);

        $newImage = UploadedFile::fake()->create('new-product.jpg', 500, 'image/jpeg');

        $response = $this->actingAs($user)->put("/admin/products/{$product->id}", [
            'name' => 'Meter Baru',
            'category' => 'Flow Meter',
            'short_description' => 'Deskripsi baru',
            'description' => 'Detail baru',
            'specifications' => 'Ukuran: 2 inch',
            'image' => $newImage,
            'is_featured' => true,
        ]);

        $response->assertRedirect(route('admin.products.index'));
        $updatedProduct = $product->fresh();
        $this->assertNotNull($updatedProduct->image_path);
        Storage::disk('public')->assertExists($updatedProduct->image_path);
    }

    public function test_admin_product_form_validates_required_fields(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->from('/admin/products/create')->post('/admin/products', [
            'name' => '',
            'category' => 'Invalid Category',
            'short_description' => '',
            'description' => '',
            'specifications' => '',
            'is_featured' => 'yes',
        ]);

        $response->assertSessionHasErrors(['name', 'category']);
        $response->assertStatus(302);
    }

    public function test_user_can_login_and_access_admin_area(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect('/admin/products');
        $this->assertAuthenticatedAs($user);

        $this->get('/admin/products')->assertOk();
    }
}
