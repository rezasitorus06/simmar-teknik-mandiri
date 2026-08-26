<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produk | Simmar Teknik Mandiri Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f4f2eb]">
<header class="border-b border-[#dfe5dc] bg-white">
    <div class="container-page flex h-20 items-center justify-between">
        <a href="{{ route('home') }}" aria-label="Simmar Teknik Mandiri" class="block h-12 w-20 shrink-0"><img src="{{ asset('images/Logo-simmar.png') }}" alt="Simmar Teknik Mandiri" class="h-full w-full object-contain"></a>
        <div class="flex items-center gap-4">
            <span class="hidden text-sm text-[#66716b] sm:block">{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">@csrf<button class="text-sm font-bold text-moss hover:text-ink">Keluar</button></form>
        </div>
    </div>
</header>
<main class="container-page py-12">
    <div class="flex items-end justify-between gap-4"><div><p class="eyebrow text-moss">Dashboard distributor</p><h1 class="mt-2 text-4xl font-semibold">Katalog produk</h1></div><a href="{{ route('admin.products.create') }}" class="rounded-full bg-moss px-5 py-3 text-sm font-bold text-white hover:bg-ink">+ Tambah produk</a></div>
    @if (session('status'))<div class="mt-6 border border-[#b8d29f] bg-[#e7f3d2] px-4 py-3 text-sm text-moss">{{ session('status') }}</div>@endif
    <div class="mt-8 overflow-x-auto bg-white"><table class="w-full min-w-[650px] text-left text-sm"><thead class="border-b border-[#e2e6dc] text-xs uppercase tracking-wider text-[#7c8981]"><tr><th class="px-5 py-4">Produk</th><th class="px-5 py-4">Kategori</th><th class="px-5 py-4">Media</th><th class="px-5 py-4 text-right">Aksi</th></tr></thead><tbody class="divide-y divide-[#edf0ea]">
        @forelse ($products as $product)
            <tr><td class="px-5 py-4"><p class="font-bold">{{ $product->name }}</p><p class="mt-1 text-xs text-[#859087]">{{ $product->is_featured ? 'Produk unggulan' : 'Produk biasa' }}</p></td><td class="px-5 py-4 text-[#66716b]">{{ $product->category ?: '-' }}</td><td class="px-5 py-4 text-xs text-[#66716b]">{{ $product->image_path ? 'Foto' : '' }} {{ $product->video_path ? 'Video' : '' }}</td><td class="px-5 py-4 text-right"><a href="{{ route('admin.products.edit', $product) }}" class="font-bold text-moss">Edit</a><form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="ml-4 inline" onsubmit="return confirm('Hapus produk ini?')">@csrf @method('DELETE')<button class="font-bold text-red-600">Hapus</button></form></td></tr>
        @empty
            <tr><td colspan="4" class="px-5 py-12 text-center text-[#66716b]">Belum ada produk.</td></tr>
        @endforelse
    </tbody></table></div>
</main>
</body>
</html>
