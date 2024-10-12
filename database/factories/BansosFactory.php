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
                                    'Bantuan Sembako Masyarakat',
                                    'Program Bantuan Tunai',
                                    'Bantuan Sosial Anak Yatim',
                                    'Bantuan Lansia',
                                    'Bantuan Pendidikan',
                                    'Program Keluarga Harapan',
                                    'Bantuan Covid-19',
                                    'Subsidi Listrik',
                                    'Bantuan Rumah Tangga',
                                    'Bantuan Bencana Alam'
                                ]),
            'gambar'                => ('infobansos.png'),
            'jenis_bansos'          => fake()->randomElement(['Sembako', 'Tunai', 'Lain-lain', 'Beras', 'Bantuan Kesehatan', 'Pendidikan', 'Kartu Sakti', 'Bantuan Bencana']),
            'periode_bansos'        => fake()->numberBetween(1,3),
            'tanggal_penyaluran'    => fake()->dateTimeBetween('-5 years', 'now'),
            'jumlah_bansos'         => fake()->numberBetween(10,30),
        ];
    }
}
