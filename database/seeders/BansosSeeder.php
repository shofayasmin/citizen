<?php

namespace Database\Seeders;

use App\Models\Bansos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BansosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bansos::factory()->count(10)->create();
    }
}
