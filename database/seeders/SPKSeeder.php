<?php

namespace Database\Seeders;

use App\Models\SPK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SPKSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SPK::factory()->count(10)->create();
    }
}
