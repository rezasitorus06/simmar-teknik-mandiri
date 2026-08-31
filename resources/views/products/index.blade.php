@extends('layouts.app', ['title' => 'Produk'])

@section('content')
<main>
    <section class="bg-[#d8e6e8] py-20">
        <div class="container-page">
            <p class="eyebrow text-moss">Katalog produk</p>
            <h1 class="mt-4 max-w-3xl text-5xl font-semibold leading-tight md:text-6xl">Water meter & flow meter untuk berbagai kebutuhan.</h1>
            <p class="mt-6 max-w-2xl leading-7 text-[#52605a]">Pilih produk untuk melihat spesifikasi, deskripsi, dan menghubungi kami untuk penawaran.</p>
        </div>
    </section>

    <section class="container-page py-20 md:py-24">
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($products as $product)
                <article class="product-card group overflow-hidden rounded-2xl">
                    <a href="{{ route('products.show', $product) }}" class="block">
                        <div class="relative aspect-[4/3] overflow-hidden bg-[#dce9d6]">
                            @if ($product->image_path)
                                <img src="{{ asset('storage/'.$product->image_path) }}" alt="{{ $product->name }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                            @else
                                <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?auto=format&fit=crop&w=800&q=80" alt="{{ $product->name }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                            @endif
                        </div>
                        <div class="p-5">
                            <p class="eyebrow text-[#7c8c83]">{{ $product->category }}</p>
                            <h2 class="mt-2 text-xl font-semibold">{{ $product->name }}</h2>
                            <p class="mt-2 text-sm leading-6 text-[#6d7972]">{{ $product->short_description }}</p>
                            <span class="mt-5 inline-flex font-bold text-moss">Lihat detail &rarr;</span>
                        </div>
                    </a>
                </article>
            @empty
                <p class="col-span-full text-[#66716b]">Belum ada produk.</p>
            @endforelse
        </div>
    </section>
</main>
@endsection
