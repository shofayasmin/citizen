<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Warga;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Laporan>
 */
class LaporanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => fake()->unique()->words(3, true),
            'pengirim' => Warga::inRandomOrder()->first()?->nik,
            'gambar' => fake()->image(null, 120, 80, 'animals', true, true, 'cats', true, 'jpg'),
            'deskripsi' => fake()->unique()->text(100),
            'status' => fake()->randomElement(['Selesai','Belum Selesai']),
        ];
    }
}
