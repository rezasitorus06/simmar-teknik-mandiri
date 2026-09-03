@extends('layouts.app', ['title' => 'Tentang Kami'])

@section('content')
<main>
    <section class="bg-[#d9eff9] py-20 md:py-28">
        <div class="container-page">
            <p class="eyebrow text-moss">Tentang kami</p>
            <h1 class="mt-5 max-w-4xl text-5xl font-semibold leading-tight md:text-7xl">Mitra pengukuran untuk <span class="text-moss">aliran yang penting.</span></h1>
            <p class="mt-7 max-w-2xl text-lg leading-8 text-[#53677e]">Simmar Teknik Mandiri adalah distributor water meter dan flow meter yang membantu kebutuhan pengukuran di berbagai sektor.</p>
        </div>
    </section>

    <section class="container-page grid gap-12 py-20 md:grid-cols-[.65fr_1.35fr] md:py-28">
        <p class="eyebrow text-moss">01 &nbsp; Siapa kami</p>
        <div>
            <h2 class="text-3xl font-semibold leading-tight md:text-5xl">Perangkat tepat. Informasi jelas. Dukungan yang bisa diandalkan.</h2>
            <p class="mt-7 leading-7 text-[#66716b]">Kami melayani pengadaan alat ukur untuk kontraktor, pengelola gedung, industri, dan sistem utilitas. Fokus kami adalah membantu Anda memilih perangkat sesuai ukuran pipa, jenis media, rentang aliran, dan kebutuhan instalasi.</p>
            <p class="mt-5 leading-7 text-[#66716b]">Dengan komunikasi yang praktis dan penawaran yang transparan, kami siap mendampingi dari tahap konsultasi sampai kebutuhan produk Anda terpenuhi.</p>
        </div>
    </section>

    <section class="border-y border-[#d5e4f0] bg-white py-20 md:py-24">
        <div class="container-page grid gap-10 lg:grid-cols-[.75fr_1.25fr]">
            <div>
                <p class="eyebrow text-moss">02 &nbsp; Visi & misi</p>
                <h2 class="mt-3 max-w-md text-3xl font-semibold leading-tight md:text-5xl">Bertumbuh bersama kebutuhan pengukuran yang lebih baik.</h2>
            </div>
            <div class="grid gap-6 md:grid-cols-[.8fr_1.2fr]">
                <article class="rounded-2xl border border-[#c9e7f4] bg-[#e7f5fc] p-7">
                    <p class="eyebrow text-moss">Visi</p>
                    <p class="mt-5 text-lg font-medium leading-8 text-ink">Menjadi mitra terpercaya dalam menyediakan solusi pengukuran air dan aliran yang akurat, berkualitas, dan berkelanjutan.</p>
                </article>
                <article class="rounded-2xl border border-[#d5e4f0] bg-[#f3f8fc] p-7">
                    <p class="eyebrow text-moss">Misi</p>
                    <ol class="mt-5 space-y-4 text-sm leading-6 text-[#53677e]">
                        <li class="flex gap-3"><span class="font-bold text-moss">01</span><span>Menyediakan water meter dan flow meter berkualitas.</span></li>
                        <li class="flex gap-3"><span class="font-bold text-moss">02</span><span>Mengutamakan ketepatan, keandalan, dan kepuasan pelanggan.</span></li>
                        <li class="flex gap-3"><span class="font-bold text-moss">03</span><span>Memberikan pelayanan profesional dan solusi sesuai kebutuhan.</span></li>
                        <li class="flex gap-3"><span class="font-bold text-moss">04</span><span>Menjaga kualitas produk serta membangun kepercayaan pelanggan.</span></li>
                        <li class="flex gap-3"><span class="font-bold text-moss">05</span><span>Mendukung efisiensi penggunaan dan pengelolaan sumber daya air.</span></li>
                    </ol>
                </article>
            </div>
        </div>
    </section>

    <section class="border-y border-[#d5e4f0] bg-[#eef7fc] py-20">
        <div class="container-page grid gap-6 md:grid-cols-3">
            <div class="feature-card rounded-2xl border border-[#dfe5dc] bg-white p-6">
                <p class="eyebrow text-moss">01</p>
                <h3 class="mt-3 text-xl font-semibold">Produk terukur</h3>
                <p class="mt-3 text-sm leading-6 text-[#66716b]">Pilihan water meter dan flow meter untuk aplikasi yang beragam.</p>
            </div>
            <div class="feature-card rounded-2xl border border-[#dfe5dc] bg-white p-6">
                <p class="eyebrow text-moss">02</p>
                <h3 class="mt-3 text-xl font-semibold">Konsultasi praktis</h3>
                <p class="mt-3 text-sm leading-6 text-[#66716b]">Bantu memahami kebutuhan spesifikasi sebelum membeli.</p>
            </div>
            <div class="feature-card rounded-2xl border border-[#dfe5dc] bg-white p-6">
                <p class="eyebrow text-moss">03</p>
                <h3 class="mt-3 text-xl font-semibold">Respon langsung</h3>
                <p class="mt-3 text-sm leading-6 text-[#66716b]">Hubungi kami melalui WhatsApp untuk kebutuhan penawaran.</p>
            </div>
        </div>
    </section>
</main>
@endsection
