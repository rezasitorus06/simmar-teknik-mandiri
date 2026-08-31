<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $heading }} | Simmar Teknik Mandiri Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f4f2eb]">
<header class="border-b border-[#dfe5dc] bg-white/80 backdrop-blur-sm">
    <div class="container-page flex h-20 items-center justify-between">
        <a href="{{ route('home') }}" aria-label="Simmar Teknik Mandiri" class="block h-12 w-20 shrink-0"><img src="{{ asset('images/Logo-simmar.png') }}" alt="Simmar Teknik Mandiri" class="h-full w-full object-contain"></a>
        <a href="{{ route('admin.products.index') }}" class="text-sm font-bold text-moss">&larr; Kembali</a>
    </div>
</header>
<main class="container-page max-w-3xl py-12"><p class="eyebrow text-moss">Product editor</p><h1 class="mt-2 text-4xl font-semibold text-ink">{{ $heading }}</h1>
<form method="POST" action="{{ $product->exists ? route('admin.products.update', $product) : route('admin.products.store') }}" enctype="multipart/form-data" class="mt-8 space-y-6 rounded-[26px] border border-[#dfe5dc] bg-white p-6 shadow-sm md:p-8">
    @csrf
    @if($product->exists) @method('PUT') @endif
    <div>
        <label class="mb-2 block text-sm font-medium text-ink">Nama produk</label>
        <input name="name" value="{{ old('name', $product->name) }}" required class="field">
        @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div class="grid gap-5 md:grid-cols-2">
        <div>
            <label for="category" class="mb-2 block text-sm font-medium text-ink">Kategori</label>
            <select id="category" name="category" required class="field"><option value="" disabled @selected(!old('category', $product->category))>Pilih kategori</option><option value="Water Meter" @selected(old('category', $product->category) === 'Water Meter')>Water Meter</option><option value="Flow Meter" @selected(old('category', $product->category) === 'Flow Meter')>Flow Meter</option></select>
            @error('category')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="mb-2 block text-sm font-medium text-ink">Deskripsi singkat</label>
            <input name="short_description" value="{{ old('short_description', $product->short_description) }}" class="field">
        </div>
    </div>
    <div>
        <label class="mb-2 block text-sm font-medium text-ink">Deskripsi lengkap</label>
        <textarea name="description" rows="5" class="field">{{ old('description', $product->description) }}</textarea>
    </div>
    <div>
        <label for="specifications" class="mb-2 block text-sm font-medium text-ink">Spesifikasi</label>
        <textarea id="specifications" name="specifications" rows="5" class="field" placeholder="Ukuran: DN50&#10;Material: Cast Iron&#10;Koneksi: Flange">{{ old('specifications', collect($product->specifications ?? [])->map(fn ($value, $key) => $key.': '.$value)->implode("\n")) }}</textarea>
        <p class="mt-2 text-xs text-[#7c8981]">Satu spesifikasi per baris dengan format: Nama: Nilai</p>
    </div>
    <div class="grid gap-5 md:grid-cols-2">
        <div>
            <label class="mb-2 block text-sm font-medium text-ink">Foto produk</label>
            <input type="file" name="image" accept="image/*" class="field p-2 text-sm">
        </div>
        <div>
            <label class="mb-2 block text-sm font-medium text-ink">Video produk</label>
            <input type="file" name="video" accept="video/mp4,video/webm,video/quicktime" class="field p-2 text-sm">
        </div>
    </div>
    <label class="flex items-center gap-3 text-sm text-ink">
        <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $product->is_featured)) class="h-4 w-4 accent-[#295e4b]">
        Tampilkan sebagai produk unggulan
    </label>
    <button class="primary-cta rounded-full px-6 py-3 text-sm font-bold">Simpan produk</button>
</form></main>
</body>
</html>
