<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Warga>
 */
class CitizenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nik' => fake()->unique()->nik(),
            'fullname' => fake()->name(),
            'birth_place' => fake()->city(),
            'birth_date' => fake()->dateTimeBetween('-80 years', '-15 years'),
            'gender' => ['Laki-laki', 'Perempuan'][fake()->randomElement(array(0, 1))],
            'address' => fake()->address(),
            'religions' => fake()->randomElement(['Islam', 'Kristen', 'Katolik','Hindu', 'Buddha', 'Konghucu']),
            'phone' => fake()->phoneNumber(),
            'status' => fake()->randomElement(['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']),

            'job'=> fake()->randomElement(['Karyawan Swasta',
            'Pegawai Negeri Sipil',
            'Wiraswasta',
            'Petani',
            'Pedagang',
            'Guru',
            'Dokter',
            'Perawat',
            'Supir',
            'Buruh',]),

            'citizenship' => fake()->country(),
            'domicile'  => fake()->address()
        ];
    }
}
