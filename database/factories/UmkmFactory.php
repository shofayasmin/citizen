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
            'umkm' => fake()->randomElement(['Delicious Halal Restaurant','Aurora Stationery Shop','Winter Milk Tea']),
            // 'gambar' => fake()->image(null, 120, 80, 'animals', true, true, 'cats', true, 'jpg'),
            'tipe_umkm' => fake()->randomElement(['Food and Beverages','Handicrafts','Fashion and Accessories','Technology','Services','Agriculture and Fisheries','Trade','Education','Health','Tourism']),
            'deskripsi' => fake()->text(50),
        ];
    }
}
