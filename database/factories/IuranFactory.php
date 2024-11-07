<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Iuran>
 */
class IuranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggal' => fake()->dateTimeThisYear('+1 months'),
            'income' => fake()->numberBetween(1, 100) * 1000000,  // Nilai pemasukan acak antara 1000 dan 10000
            'outcome' => fake()->numberBetween(1, 100) * 1000000,  // Nilai pengeluaran acak antara 500 dan 5000
            'total' => function (array $attributes) {
                return $attributes['income'] - $attributes['outcome'];
            },
            'deskripsi' => fake()->text(50),
        ];
    }
}
