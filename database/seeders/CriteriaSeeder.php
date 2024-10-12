<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Jumlah Usia Produktif',
                'weight' => 0.25,
                
            ],
            [
                'name' => 'Jumlah Anggota Keluarga',
                'weight' => 0.25,
                
            ],
            [
                'name' => 'Kondisi Rumah',
                'weight' => 0.20,
                
            ],
            [
                'name' => 'Jumlah Usia Lanjut',
                'weight' => 0.20,
                
            ],
            [
                'name' => 'Pendapatan',
                'weight' => 0.10,
                
            ],
        ];
        DB::table('criterias')->insert($data);
    }
}
