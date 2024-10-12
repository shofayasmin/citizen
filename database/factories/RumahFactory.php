<?php

namespace Database\Factories;

use App\Models\Warga;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rumah>
 */
class RumahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $warga = Warga::inRandomOrder()->first();

        return [
            'nik_pemilik' => $warga ? $warga->nik : null,
            'alamat' => $this->faker->address,
            'luas_bangunan' => $this->faker->numberBetween(50, 700),
            'luas_tanah' => $this->faker->numberBetween(50, 700),
            'jumlah_anggota_kk' => $this->faker->numberBetween(1,2)
           
        ];
    }
}
