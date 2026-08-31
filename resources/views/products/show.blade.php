@extends('layouts.app', ['title' => $product->name])

@section('content')
<main>
    <section class="container-page py-12 md:py-20">
        <a href="{{ route('products.index') }}" class="text-sm font-bold text-moss">&larr; Kembali ke produk</a>

        <div class="mt-10 grid items-start gap-12 md:grid-cols-2">
            <div class="overflow-hidden rounded-[22px] border border-[#dfe5dc] bg-[#d8e6e8] shadow-sm">
                @if ($product->image_path)
                    <img src="{{ asset('storage/'.$product->image_path) }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                @else
                    <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?auto=format&fit=crop&w=1000&q=85" alt="{{ $product->name }}" class="h-full w-full object-cover">
                @endif
            </div>

            <div>
                <p class="eyebrow text-moss">{{ $product->category }}</p>
                <h1 class="mt-4 text-4xl font-semibold leading-tight md:text-6xl">{{ $product->name }}</h1>
                <p class="mt-6 text-lg leading-8 text-[#66716b]">{{ $product->short_description }}</p>
                <a href="https://wa.me/{{ config('app.whatsapp', '6281234567890') }}?text={{ urlencode('Halo Simmar Teknik Mandiri, saya tertarik dengan '.$product->name.'. Mohon info spesifikasi dan harga.') }}" target="_blank" class="primary-cta mt-8 inline-flex rounded-full px-6 py-3.5 text-sm font-bold">Minta penawaran &rarr;</a>
            </div>
        </div>
    </section>

    <section class="border-y border-[#dfe5dc] bg-[#faf9f5] py-16 md:py-20">
        <div class="container-page grid gap-12 md:grid-cols-[1fr_.8fr]">
            <div>
                <p class="eyebrow text-moss">Deskripsi produk</p>
                <div class="mt-5 max-w-2xl whitespace-pre-line leading-8 text-[#52605a]">{{ $product->description ?: 'Informasi produk sedang diperbarui.' }}</div>
            </div>

            <div class="rounded-2xl border border-[#dfe5dc] bg-white p-6">
                <p class="eyebrow text-moss">Spesifikasi</p>
                @if ($product->specifications)
                    <dl class="mt-5 divide-y divide-[#dfe5dc]">
                        @foreach ($product->specifications as $label => $value)
                            <div class="grid grid-cols-2 gap-4 py-4 text-sm">
                                <dt class="font-bold text-ink">{{ $label }}</dt>
                                <dd class="text-[#66716b]">{{ $value }}</dd>
                            </div>
                        @endforeach
                    </dl>
                @else
                    <p class="mt-5 text-[#66716b]">Spesifikasi tersedia melalui konsultasi teknis.</p>
                @endif
            </div>
        </div>
    </section>

    @if ($product->video_path)
        <section class="container-page py-16">
            <p class="eyebrow text-moss">Video produk</p>
            <video controls class="mt-5 max-h-[520px] w-full rounded-2xl border border-[#dfe5dc] bg-ink object-cover shadow-sm"><source src="{{ asset('storage/'.$product->video_path) }}"></video>
        </section>
    @endif
</main>
@endsection
