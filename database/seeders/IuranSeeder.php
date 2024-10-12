<?php

namespace Database\Seeders;

use App\Models\Iuran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IuranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Iuran::factory()->count(10)->create();
    }
}
