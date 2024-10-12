<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Acara>
 */
class AcaraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => fake()->randomElement(['Gotong Royong', 'Jalan Sehat', 'Bazar', 'Lomba', 'Rapat Warga']),
            'deskripsi' => fake()->text(),
            'tipe_acara' => fake()->randomElement(['Informasi', 'Kegiatan'])
        ];
    }
}
