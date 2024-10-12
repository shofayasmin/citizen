<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class seed_UMKM extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'acara_id' => 1,
                'judul_acara' => "kedatangan 01",
                'deskripsi' => 'Wah ternyata ada 01 yang datang nih GG',
                'tipe_acara' => 'Informasi',
                'image' => '--',
                'password' => Hash::make('12345'),
            ],
            [
                'acara_id' => 2,
                'judul_acara' => "kedatangan 02",
                'deskripsi' => 'Wah ternyata ada 02 yang datang nih GG',
                'tipe_acara' => 'Informasi',
                'image' => '--',
                'password' => Hash::make('12345'),
            ],
            [
                'acara_id' => 1,
                'judul_acara' => "kedatangan 03",
                'deskripsi' => 'Wah ternyata ada 03 yang datang nih GG',
                'tipe_acara' => 'Informasi',
                'image' => '--',
                'password' => Hash::make('12345'),
            ],
        ];
        DB::table('acara')->insert($data);
    }
}
