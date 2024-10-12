<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\umkm>
 */
class UmkmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name,
            'umkm' => fake()->randomElement(['Toko Kebab 99% Halal','Alcohol Store 80% aman','Rokok electric bahan dasar Air']),
            // 'gambar' => fake()->image(null, 120, 80, 'animals', true, true, 'cats', true, 'jpg'),
            'tipe_umkm' => fake()->randomElement(['Makanan dan Minuman','Kerajinan Tangan','Fashion dan Aksesoris','Teknologi','Jasa','Pertanian dan Perikanan','Perdagangan','Pendidikan','Kesehatan','Pariwisata']),
            'deskripsi' => fake()->text(50),
        ];
    }
}
