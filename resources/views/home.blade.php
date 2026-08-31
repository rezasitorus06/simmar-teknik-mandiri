@extends('layouts.app', ['title' => 'Water meter dan flow meter terpercaya'])

@section('content')
<main>
    <!-- Hero -->
    <section class="relative overflow-hidden bg-[#d8e6e8] py-20 md:py-28">
        <div class="container-page grid items-end gap-12 md:grid-cols-[1.05fr_.95fr]">
            <div class="relative z-10">
                <p class="eyebrow text-moss">Simmar Teknik Mandiri</p>
                <h1 class="mt-5 max-w-2xl text-5xl font-semibold leading-[.98] tracking-tight text-ink md:text-7xl">Solusi Water Meter & Flow Meter <span class="text-moss">Terpercaya untuk Industri Anda</span></h1>
                <p class="mt-7 max-w-md text-base leading-7 text-[#52605a]">Ratusan perusahaan mempercayai kami untuk pengukuran akurat, layanan purna jual terbaik, dan harga kompetitif di Indonesia.</p>
                <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('products.index') }}" class="primary-cta inline-flex items-center justify-center gap-3 rounded-full px-8 py-4 text-sm font-bold">Lihat semua produk <span aria-hidden="true">&darr;</span></a>
                    <a href="https://wa.me/{{ config('app.whatsapp', '6281234567890') }}?text={{ urlencode('Halo Simmar Teknik Mandiri, saya ingin mendapatkan penawaran khusus untuk water meter atau flow meter.') }}" target="_blank" class="secondary-cta inline-flex items-center justify-center gap-2 rounded-full px-8 py-4 text-sm font-bold">Dapatkan Penawaran Khusus</a>
                </div>
            </div>
            <div class="relative min-h-[300px] overflow-hidden rounded-[2px] bg-[#8eb8c0] md:min-h-[410px]">
                <img src="https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=1000&q=85" alt="Peralatan teknis untuk pengukuran aliran" class="absolute inset-0 h-full w-full object-cover mix-blend-multiply opacity-90">
                <div class="absolute bottom-5 left-5 rounded-full bg-lime px-4 py-2 text-xs font-bold text-ink shadow-sm">✓ Akurasi Tinggi</div>
            </div>
        </div>
        <div class="pointer-events-none absolute -right-16 -top-16 h-60 w-60 rounded-full border-[32px] border-white/30"></div>
    </section>

    <!-- Keunggulan -->
    <section class="bg-white py-16 md:py-24">
        <div class="container-page">
            <div class="text-center mb-12">
                <p class="eyebrow text-moss">Mengapa Memilih Kami?</p>
                <h2 class="mt-3 text-3xl font-semibold text-ink md:text-4xl">Keunggulan yang Anda Butuhkan</h2>
            </div>
            <div class="grid gap-8 md:grid-cols-3">
                <div class="feature-card rounded-2xl border border-[#dfe5dc] bg-white p-8">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-moss/10 text-moss mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-ink mb-3">Akurasi Tinggi</h3>
                    <p class="text-[#66716b]">Pengukuran presisi hingga ±0.5% dengan sensor teknologi terkini untuk hasil yang dapat diandalkan setiap hari.</p>
                </div>
                <div class="feature-card rounded-2xl border border-[#dfe5dc] bg-white p-8">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-moss/10 text-moss mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-ink mb-3">Garansi Resmi 2 Tahun</h3>
                    <p class="text-[#66716b]">Perlindungan penuh dengan garansi resmi dan dukungan teknis 24/7 dari tim ahli kami yang berpengalaman.</p>
                </div>
                <div class="feature-card rounded-2xl border border-[#dfe5dc] bg-white p-8">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-moss/10 text-moss mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.172l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5-4a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-ink mb-3">Layanan Purna Jual Terbaik</h3>
                    <p class="text-[#66716b]">Maintenance rutin, spare parts original, dan training gratis untuk memaksimalkan investasi Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="tentang" class="container-page grid gap-10 py-24 md:grid-cols-[.7fr_1.3fr] md:py-32"><p class="eyebrow text-moss">01 &nbsp; Tentang Simmar</p><div><h2 class="max-w-3xl text-3xl font-semibold leading-tight md:text-5xl">Solusi pengukuran untuk aliran yang <span class="text-moss">lebih terkendali.</span></h2><p class="mt-7 max-w-2xl leading-7 text-[#66716b]">Simmar Teknik Mandiri membantu bisnis dan kontraktor menemukan perangkat pengukuran yang tepat. Kami menyediakan produk untuk jaringan air bersih, proses industri, gedung, dan sistem utilitas.</p><a href="{{ route('about') }}" class="mt-6 inline-flex font-bold text-moss">Kenali Simmar lebih jauh &rarr;</a></div></section>

    <!-- FAQ -->
    <section class="bg-[#faf9f5] py-16 md:py-24">
        <div class="container-page">
            <div class="mb-12">
                <p class="eyebrow text-moss">Pertanyaan Umum</p>
                <h2 class="mt-3 text-3xl font-semibold text-ink md:text-4xl">Pertanyaan yang sering ditanyakan</h2>
            </div>
            <div class="grid gap-6 md:grid-cols-2">
                <!-- FAQ 1 -->
                <div class="faq-card rounded-2xl border border-[#dfe5dc] bg-white p-6">
                    <h3 class="font-semibold text-ink text-lg mb-2">Bagaimana cara pemasangan water meter?</h3>
                    <p class="text-[#66716b] text-sm leading-6">Pemasangan water meter cukup sederhana. Kami menyediakan panduan instalasi lengkap dan dapat memberikan training gratis untuk tim Anda. Diperlukan waktu maksimal 2 jam untuk instalasi standar di sistem pipa Anda.</p>
                </div>
                <!-- FAQ 2 -->
                <div class="faq-card rounded-2xl border border-[#dfe5dc] bg-white p-6">
                    <h3 class="font-semibold text-ink text-lg mb-2">Berapa lama masa garansi produk?</h3>
                    <p class="text-[#66716b] text-sm leading-6">Semua produk kami dilengkapi dengan garansi resmi selama 2 tahun sejak tanggal pembelian. Garansi mencakup kerusakan manufaktur dan ketidakakuratan pengukuran di atas batas toleransi yang ditetapkan.</p>
                </div>
                <!-- FAQ 3 -->
                <div class="faq-card rounded-2xl border border-[#dfe5dc] bg-white p-6">
                    <h3 class="font-semibold text-ink text-lg mb-2">Apakah ada layanan maintenance rutin?</h3>
                    <p class="text-[#66716b] text-sm leading-6">Ya, kami menawarkan paket maintenance tahunan dengan harga terjangkau. Layanan termasuk pemeriksaan akurasi, kalibrasi ulang jika diperlukan, dan penggantian spare parts yang sudah aus.</p>
                </div>
                <!-- FAQ 4 -->
                <div class="faq-card rounded-2xl border border-[#dfe5dc] bg-white p-6">
                    <h3 class="font-semibold text-ink text-lg mb-2">Bagaimana jika ada masalah teknis dengan produk?</h3>
                    <p class="text-[#66716b] text-sm leading-6">Tim support kami siap membantu 24/7 via WhatsApp, email, atau telepon. Untuk masalah yang memerlukan service on-site, kami dapat mengirimkan teknisi dalam 24 jam untuk area Jabodetabek.</p>
                </div>
                <!-- FAQ 5 -->
                <div class="faq-card rounded-2xl border border-[#dfe5dc] bg-white p-6">
                    <h3 class="font-semibold text-ink text-lg mb-2">Apakah tersedia cicilan untuk pembelian?</h3>
                    <p class="text-[#66716b] text-sm leading-6">Tentu saja! Kami bekerja sama dengan beberapa bank dan fintech untuk menyediakan opsi cicilan 3-12 bulan tanpa bunga. Hubungi sales team kami untuk informasi lebih lanjut.</p>
                </div>
                <!-- FAQ 6 -->
                <div class="faq-card rounded-2xl border border-[#dfe5dc] bg-white p-6">
                    <h3 class="font-semibold text-ink text-lg mb-2">Apa saja ukuran/spesifikasi yang tersedia?</h3>
                    <p class="text-[#66716b] text-sm leading-6">Kami menyediakan water meter dan flow meter dengan berbagai ukuran pipa (15mm hingga 300mm) dan range pengukuran yang berbeda. Konsultasikan kebutuhan Anda dengan tim kami untuk rekomendasi terbaik.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="produk" class="border-y border-[#dfe5dc] bg-[#faf9f5] py-20 md:py-24"><div class="container-page"><div class="flex items-end justify-between gap-5"><div><p class="eyebrow text-moss">02 &nbsp; Produk pilihan</p><h2 class="mt-3 text-3xl font-semibold md:text-4xl">Water meter & flow meter</h2></div><a href="{{ route('products.index') }}" class="text-sm font-bold text-moss">Lihat semua &rarr;</a></div><div class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @forelse ($products->take(3) as $product)
            <article class="product-card group overflow-hidden"><a href="{{ route('products.show', $product) }}" class="block"><div class="relative aspect-[4/3] overflow-hidden bg-[#dce9d6]">
                @if ($product->image_path)
                    <img src="{{ asset('storage/'.$product->image_path) }}" alt="{{ $product->name }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                @else
                    <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?auto=format&fit=crop&w=800&q=80" alt="{{ $product->name }}" class="h-full w-full object-cover grayscale-[20%] transition duration-500 group-hover:scale-105">
                @endif
                @if ($product->is_featured)
                    <span class="absolute left-4 top-4 rounded-full bg-lime px-3 py-1 text-[10px] font-bold uppercase tracking-wider">Unggulan</span>
                @endif
            </div><div class="p-5"><p class="eyebrow text-[#7c8c83]">{{ $product->category ?: 'Produk' }}</p><h3 class="mt-2 text-xl font-semibold">{{ $product->name }}</h3><p class="mt-2 text-sm leading-6 text-[#6d7972]">{{ $product->short_description }}</p><span class="mt-5 inline-flex items-center gap-2 text-sm font-bold text-moss">Lihat spesifikasi <span>&rarr;</span></span></div></a><div class="px-5 pb-5"><a href="https://wa.me/{{ config('app.whatsapp', '6281234567890') }}?text={{ urlencode('Halo Simmar Teknik Mandiri, saya tertarik dengan '.$product->name.'. Mohon info spesifikasi dan harga.') }}" target="_blank" class="text-sm font-bold text-moss">Minta penawaran via WhatsApp</a></div></article>
        @empty
            <p class="col-span-full py-12 text-center text-[#6d7972]">Koleksi sedang disiapkan. Silakan kembali lagi.</p>
        @endforelse
    </div></div></section>

    <section class="container-page py-24 md:py-32"><div class="grid items-center gap-10 md:grid-cols-2"><div><p class="eyebrow text-moss">03 &nbsp; Konsultasi teknis</p><h2 class="mt-4 max-w-lg text-4xl font-semibold leading-tight md:text-5xl">Butuh alat ukur untuk sistem Anda?</h2><p class="mt-6 max-w-md leading-7 text-[#66716b]">Kirim kebutuhan, ukuran pipa, dan jenis cairan yang diukur. Tim kami siap membantu memilih produk yang sesuai.</p><a href="https://wa.me/{{ config('app.whatsapp', '6281234567890') }}?text={{ urlencode('Halo Simmar Teknik Mandiri, saya ingin berkonsultasi mengenai kebutuhan water meter atau flow meter.') }}" target="_blank" class="primary-cta mt-8 inline-flex rounded-full px-6 py-3.5 text-sm font-bold">Chat via WhatsApp &rarr;</a></div><div class="aspect-[4/3] overflow-hidden bg-[#d8e6e8]"><img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=1000&q=85" alt="Teknisi bekerja dengan peralatan industri" class="h-full w-full object-cover"></div></div></section>
</main>
@endsection
