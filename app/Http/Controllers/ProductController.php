<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('admin.products.index', ['products' => Product::latest()->get()]);
    }

    public function create(): View
    {
        return view('admin.products.form', ['product' => new Product, 'heading' => 'Tambah produk']);
    }

    public function store(Request $request)
    {
        $product = new Product;
        $this->saveProduct($product, $request);

        return redirect()->route('admin.products.index')->with('status', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product): View
    {
        return view('admin.products.form', ['product' => $product, 'heading' => 'Edit produk']);
    }

    public function update(Request $request, Product $product)
    {
        $this->saveProduct($product, $request);

        return redirect()->route('admin.products.index')->with('status', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        foreach (['image_path', 'video_path'] as $field) {
            if ($product->{$field}) {
                Storage::disk('public')->delete($product->{$field});
            }
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('status', 'Produk berhasil dihapus.');
    }

    private function saveProduct(Product $product, Request $request): void
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'category' => ['required', 'string', Rule::in(['Water Meter', 'Flow Meter'])],
            'short_description' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:5120'],
            'video' => ['nullable', 'mimetypes:video/mp4,video/webm,video/quicktime', 'max:51200'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        $data['slug'] = Str::slug($data['name']);
        $data['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('image')) {
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }
            $data['image_path'] = $request->file('image')->store('products', 'public');
        }

        if ($request->hasFile('video')) {
            if ($product->video_path) {
                Storage::disk('public')->delete($product->video_path);
            }
            $data['video_path'] = $request->file('video')->store('products', 'public');
        }

        $product->fill($data)->save();
    }
}
