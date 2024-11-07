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
            'judul' => fake()->randomElement(['Medical Checkup', 'Fun Walk', 'Bazaar', 'Competition', 'Community Meeting']),
            'deskripsi' => fake()->text(),
            'tipe_acara' => fake()->randomElement(['Information', 'Activity'])
        ];
    }
}
