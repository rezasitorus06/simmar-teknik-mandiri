@extends('layouts.app', ['title' => 'Produk'])

@section('content')
<main>
    <section class="bg-[#d9eff9] py-20">
        <div class="container-page">
            <p class="eyebrow text-moss">Katalog produk</p>
            <h1 class="mt-4 max-w-3xl text-5xl font-semibold leading-tight md:text-6xl">Water meter & flow meter untuk berbagai kebutuhan.</h1>
            <p class="mt-6 max-w-2xl leading-7 text-[#52605a]">Pilih produk untuk melihat spesifikasi, deskripsi, dan menghubungi kami untuk penawaran.</p>
        </div>
    </section>

    <section class="container-page py-16 md:py-24">
        <div class="grid items-start gap-10 lg:grid-cols-[260px_1fr]">
            <aside class="category-panel" aria-label="Kategori produk">
                <a href="#produk" class="category-all" data-filter-category="all">Semua kategori</a>
                <div class="category-list">
                    @foreach ($categories as $category => $subcategories)
                        <details class="category-group" @if ($loop->index === 2) open @endif>
                                <summary>
                                    <span data-filter-category="{{ $category }}">{{ $category }}</span>
                                    <span class="category-chevron" aria-hidden="true">&#8250;</span>
                                </summary>
                                <div class="category-children">
                                    @foreach ($subcategories as $subcategory)
                                        <a href="#produk" class="category-child" data-filter-category="{{ $category }}" data-filter-subcategory="{{ $subcategory }}">{{ $subcategory }}</a>
                                    @endforeach
                                </div>
                        </details>
                    @endforeach
                </div>
            </aside>

            <div>
                <div class="mb-7 flex items-end justify-between gap-4 border-b border-[#d5e4f0] pb-5">
                    <div>
                        <p class="eyebrow text-moss">Pilihan untuk Anda</p>
                        <h2 class="mt-2 text-2xl font-semibold text-ink md:text-3xl">Temukan produk yang sesuai</h2>
                    </div>
                    <span class="hidden text-sm text-[#7c8981] sm:block">{{ $products->count() }} produk</span>
                </div>
                <div id="produk" class="grid gap-6 md:grid-cols-2">
                @forelse ($products as $product)
                    <article class="product-card group overflow-hidden rounded-2xl" data-product-category="{{ $product->category }}" data-product-subcategory="{{ $product->subcategory }}">
                        <a href="{{ route('products.show', $product) }}" class="block">
                            <div class="relative aspect-[4/3] overflow-hidden bg-[#e4f3fb]">
                                @if ($product->image_path)
                                    <img src="{{ asset('storage/'.$product->image_path) }}" alt="{{ $product->name }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                                @else
                                    <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?auto=format&fit=crop&w=800&q=80" alt="{{ $product->name }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                                @endif
                            </div>
                            <div class="p-5">
                                <p class="eyebrow text-[#7c8c83]">{{ $product->category }}</p>
                                <h2 class="mt-2 text-xl font-semibold">{{ $product->name }}</h2>
                                @if ($product->subcategory)
                                    <p class="mt-2 text-xs font-semibold uppercase tracking-wider text-moss">{{ $product->subcategory }}</p>
                                @endif
                                <p class="mt-2 text-sm leading-6 text-[#6d7972]">{{ $product->short_description }}</p>
                                <span class="mt-5 inline-flex font-bold text-moss">Lihat detail &rarr;</span>
                            </div>
                        </a>
                    </article>
                @empty
                    <p class="col-span-full text-[#66716b]">Belum ada produk.</p>
                @endforelse
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
