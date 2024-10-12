<?php

namespace Database\Factories;

use App\Models\Warga;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organisasi>
 */
class OrganisasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_organisasi' => fake()->unique()->word(),
            'ketua' => Warga::inRandomOrder()->first()?->nik,
            'wakil' => Warga::inRandomOrder()->first()?->nik,
            'jumlah_anggota' => fake()->numberBetween(1,4),
        ];
    }
}
