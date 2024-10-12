<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use App\Models\Alternatives;
use App\Models\Bansos;

use App\Models\Iuran;
use App\Models\Kk;
use App\Models\laporan;
use App\Models\Organisasi;
use App\Models\Rt;
use App\Models\Rumah;
use App\Models\User;
use App\Models\Acara;
use App\Models\Expenditure;
use App\Models\Income;
use App\Models\umkm;
use App\Models\Warga;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Warga::factory(200)->create();
        // Get unique no_kk values from Warga
        $uniqueNoKks = Warga::pluck('no_kk')->unique();

        // Create KK records based on unique no_kk values
        foreach ($uniqueNoKks as $noKk) {
            KK::factory()->create([
                'no_kk' => $noKk,
            ]);
        }
        Rumah::factory(40)->create();
        User::factory(10)->create();
        umkm::factory(4)->create();
        Acara::factory(6)->create();
        Iuran::factory(30)->create();
        Bansos::factory(2500)->create();
        Rt::factory(5)->create();
        Alternatives::factory(30)->create();
        laporan::factory(10)->create();
        Organisasi::factory(5)->create();
        Income::factory(10)->create();
        Expenditure::factory(10)->create();


        $this->call(CriteriaSeeder::class);




    }
}
