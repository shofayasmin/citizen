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
            'gender' => ['Male', 'Female'][fake()->randomElement(array(0, 1))],
            'address' => fake()->address(),
            'religions' => fake()->randomElement(['Islam', 'Christian', 'Catholic','Hindu', 'Buddhist', 'Confucian', 'None']),
            'phone' => fake()->phoneNumber(),
            'status' => fake()->randomElement(['Single', 'Married', 'Divorce', 'Dead Divorce']),

            'job'=> fake()->randomElement([
                'Private Employee',
                'Civil Servant',
                'Self-employed',
                'Farmer',
                'Seller',
                'Teacher',
                'Doctor',
                'Nurse',
                'Driver',
                'Laborer']),

            'citizenship' => fake()->country(),
            'domicile'  => fake()->address()
        ];
    }
}
