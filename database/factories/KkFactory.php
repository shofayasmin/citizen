<?php

namespace Database\Factories;

use App\Models\Warga;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kk>
 */
class KkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $kepala = Warga::inRandomOrder()->first();
        return [
            'no_kk' => $kepala->no_kk,
            'alamat' => fake()->text(75),
            'nik_kepala_keluarga' => $kepala->nik,
        ];
    }
}
