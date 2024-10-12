<?php

namespace Database\Factories;

use App\Models\Warga;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rt>
 */
class RtFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nik_ketua'=> Warga::inRandomOrder()->first()?->nik,
            'no_rt'=>fake()->numberBetween(1,13),
            'mulai_masa_jabatan'=>fake()->dateTimeThisYear('2 months'),
            'berakhir_masa_jabatan'=>function (array $attributes) {
                return (clone $attributes['mulai_masa_jabatan'])->modify('+1 year');
            }
        ];
    }
}
