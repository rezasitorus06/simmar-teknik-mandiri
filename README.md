# Simmar Teknik Mandiri

Website katalog produk dan admin panel untuk distributor water meter dan flow meter.

## Tentang proyek

Proyek ini dibuat untuk membantu pemilik usaha menampilkan produk, menjelaskan spesifikasi, dan menerima permintaan penawaran melalui WhatsApp dengan tampilan yang lebih rapi dan profesional.

Fitur utama:
- halaman depan yang menonjolkan produk unggulan
- katalog produk yang bisa dilihat publik
- detail produk dengan deskripsi dan spesifikasi
- area admin untuk menambah, mengedit, dan menghapus produk
- upload foto dan video produk
- integrasi tombol WhatsApp untuk konsultasi dan penawaran

## Teknologi

- Laravel
- PHP 8+
- Tailwind CSS
- Vite
- SQLite untuk testing, dan database aplikasi sesuai konfigurasi lokal

## Persiapan lokal

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install
npm run build
```

Untuk menjalankan aplikasi secara lokal:

```bash
php artisan serve
```

## Admin

Akses area admin melalui route berikut:

```bash
/login
```

Setelah login, admin dapat mengelola katalog produk dari halaman:

```bash
/admin/products
```

## Testing

```bash
php artisan test
```

## Catatan

Proyek ini sudah disesuaikan untuk kebutuhan bisnis yang lebih nyata dan terasa lebih human, dengan copy dan tampilan yang dibuat agar tidak terkesan seperti template default generik.
