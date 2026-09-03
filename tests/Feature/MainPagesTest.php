<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MainPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_loads(): void
    {
        $response = $this->get('/');

        $response->assertOk();
    }

    public function test_about_page_loads(): void
    {
        $response = $this->get('/tentang-kami');

        $response->assertOk()
            ->assertSee('Menjadi mitra terpercaya dalam menyediakan solusi pengukuran air dan aliran')
            ->assertSee('Mendukung efisiensi penggunaan dan pengelolaan sumber daya air.');
    }

    public function test_product_listing_page_loads(): void
    {
        $response = $this->get('/produk');

        $response->assertOk()
            ->assertSee('Aksesoris')
            ->assertSee('Flow meter digital')
            ->assertSeeHtml('Water meter 20&quot;');
    }

    public function test_product_detail_shows_category_and_subcategory(): void
    {
        $product = Product::create([
            'name' => 'Flow Meter Digital',
            'slug' => 'flow-meter-digital',
            'category' => 'Flow Meter',
            'subcategory' => 'Flow meter digital',
        ]);

        $this->get(route('products.show', $product))
            ->assertOk()
            ->assertSee('Kategori:')
            ->assertSee('Flow Meter')
            ->assertSee('Flow meter digital');
    }

    public function test_login_page_loads(): void
    {
        $response = $this->get('/login');

        $response->assertOk();
    }
}
