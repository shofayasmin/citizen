<?php

namespace Database\Factories;

use App\Models\Kk;
use App\Models\Rumah;
use App\Models\Warga;
use App\Models\Alternatives;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alternatives>
 */
class AlternativesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $owner = Kk::inRandomOrder()->first()->nik_kepala_keluarga;
        // if(Alternatives::where('name', $owner)->exists()){
        //     return [];
        // }
        $nkkOwner = Warga::where('nik', $owner)->firstOrFail()->no_kk;
        $jumlahAnggotaKeluarga = Warga::where('no_kk', $nkkOwner)->count();


        $warga = Warga::where('no_kk', $nkkOwner)->get();  // Fetch all family members

        $productiveCount = 0;
        $elderlyCount = 0;
        
        foreach ($warga as $member) {
            $birthDate = Carbon::parse($member->tanggal_lahir);
            $today = Carbon::now();
            $age = $today->diffInYears($birthDate);
            
            if ($age >= 15 && $age < 55) {
                $productiveCount++;
            } else if ($age >= 55) {
                $elderlyCount++;
            }
        }
        
        $rumah = Rumah::where('nik_pemilik', $owner)->first()->luas_bangunan ?? 50;
        $kondisiRumah = (($rumah - 50) / (700 - 50)) * 10 + 1;

        return [
            'rumah_id'                  =>Rumah::inRandomOrder()->first()->rumah_id,
            'name'                      =>$owner,
            'jumlah_usia_produktif'     =>$productiveCount,
            'jumlah_anggota_keluarga'   =>$jumlahAnggotaKeluarga,
            'kondisi_rumah'             =>$kondisiRumah,
            'jumlah_usia_lanjut'        =>$elderlyCount,
            'pendapatan_total'          =>fake()->numberBetween(1,30) * 100000,
        ];
    }

}
