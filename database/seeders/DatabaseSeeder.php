<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin Simmar',
            'email' => 'admin@simmarteknikmandiri.test',
            'password' => 'password',
        ]);

        Product::create([
            'name' => 'Water Meter Woltman',
            'slug' => 'water-meter-woltman',
            'category' => 'Water Meter',
            'short_description' => 'Pengukuran debit air yang stabil untuk jaringan utama.',
            'description' => 'Water meter tipe Woltman untuk aplikasi jaringan air bersih, gedung, dan utilitas.',
            'specifications' => ['Tipe' => 'Woltman', 'Ukuran' => 'DN50 - DN300', 'Koneksi' => 'Flange', 'Media' => 'Air bersih'],
            'is_featured' => true,
        ]);

        Product::create([
            'name' => 'Flow Meter Electromagnetic',
            'slug' => 'flow-meter-electromagnetic',
            'category' => 'Flow Meter',
            'short_description' => 'Pembacaan aliran presisi untuk kebutuhan proses industri.',
            'description' => 'Flow meter electromagnetic untuk cairan konduktif dengan pembacaan yang akurat dan minim perawatan.',
            'specifications' => ['Tipe' => 'Electromagnetic', 'Ukuran' => 'DN25 - DN500', 'Output' => '4-20 mA / Pulse', 'Media' => 'Cairan konduktif'],
            'is_featured' => true,
        ]);
    }
}
