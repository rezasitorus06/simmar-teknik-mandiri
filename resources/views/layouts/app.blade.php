<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Simmar Teknik Mandiri' }} | Simmar Teknik Mandiri</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="border-b border-[#dfe5dc] bg-[#f4f2eb]/90 backdrop-blur">
        <div class="container-page flex h-20 items-center justify-between">
            <a href="{{ route('home') }}" aria-label="Simmar Teknik Mandiri" class="block h-12 w-20 shrink-0"><img src="{{ asset('images/Logo-simmar.png') }}" alt="Simmar Teknik Mandiri" class="h-full w-full object-contain"></a>
            <nav class="hidden items-center gap-8 text-sm font-medium md:flex">
                <a class="nav-link" href="{{ route('home') }}#produk">Produk</a>
                <a class="nav-link" href="{{ route('home') }}#tentang">Tentang kami</a>
                <a class="nav-link" href="{{ route('home') }}#kontak">Kontak</a>
            </nav>
            <a href="https://wa.me/{{ config('app.whatsapp', '6281234567890') }}?text={{ urlencode('Halo Simmar Teknik Mandiri, saya ingin berkonsultasi tentang water meter atau flow meter.') }}" target="_blank" class="rounded-full bg-moss px-5 py-2.5 text-sm font-bold text-white transition hover:bg-ink">Konsultasi teknis</a>
        </div>
    </header>

    @yield('content')

    <footer id="kontak" class="bg-ink py-12 text-white">
        <div class="container-page flex flex-col justify-between gap-8 md:flex-row md:items-end">
            <div><img src="{{ asset('images/Logo-simmar.png') }}" alt="Simmar Teknik Mandiri" class="block h-auto object-contain" style="width: 120px; max-width: 120px; height: auto;"><p class="mt-2 max-w-xs text-sm leading-6 text-white/60">Distributor water meter dan flow meter untuk kebutuhan industri, gedung, dan utilitas.</p></div>
            <div class="text-sm text-white/60 md:text-right"><p>Indonesia</p><p class="mt-1">info@simmarteknikmandiri.com &middot; WhatsApp tersedia untuk konsultasi</p></div>
        </div>
    </footer>
</body>
</html>
