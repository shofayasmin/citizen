<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bansos>
 */
class BansosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul'                 => fake()->randomElement([
                                    'Community Basic Food Support',
                                    'Cash Support Program',
                                    'Social Support for Orphans',
                                    'Elderly Care Support',
                                    'Education Support',
                                    'Family Hope Program',
                                    'Covid-19 Support',
                                    'Electricity Subsidy',
                                    'Household Support',
                                    'Natural Disaster Support'
                                ]),
            'gambar'                => ('infobansos.png'),
            'jenis_bansos'          => fake()->randomElement(['Basic Food', 'Cash', 'Other', 'Rice', 'Health Aid', 'Education', 'Magic Card', 'Disaster Support']),
            'periode_bansos'        => fake()->numberBetween(1,3),
            'tanggal_penyaluran'    => fake()->dateTimeBetween('-5 years', 'now'),
            'jumlah_bansos'         => fake()->numberBetween(10,30),
        ];
    }
}
