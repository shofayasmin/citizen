<?php

namespace Database\Seeders;

use App\Models\Alternatives;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlternativesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Alternatives::factory()->count(10)->create();
    }
}
