<?php

namespace App\Http\Controllers;

use App\Models\SPK;
use Illuminate\Http\Request;

class SpkController extends Controller
{

    public function index()
    {
        $data = SPK::get();
        $processedData = [];

        foreach ($data as $item) {
            $processedData[] = $this->createMatrix($item);
        }

        

        return view('spk.topsis', compact('processedData','data'));

    }
    


    private function createMatrix($data)
    {
        // Inisialisasi nilai untuk setiap kriteria
        $luas_rumah         = ($data->luas_rumah <= 25) ? 5 : 3;
        $gaji               = ($data->gaji <= 3000000) ? 9 : (($data->gaji <= 5000000) ? 7 : 5);
        $status_perkawinan  = ($data->status == 'Sudah Kawin') ? 5 : (($data->status == 'Sudah Kawin Sudah ada Anak') ? 9 : (($data->status == 'Sudah Kawin Belum ada Anak') ? 7 : 3));
        $jumlah_usia_lanjut = ($data->jumlah_usia_lanjut == 0) ? 1 : (($data->jumlah_usia_lanjut == 1) ? 3 : (($data->jumlah_usia_lanjut == 2) ? 5 : (($data->jumlah_usia_lanjut == 3) ? 7 : 9)));
        $jarak_domisili     = ($data->jarak_domisili <= 100) ? 9 : (($data->jarak_domisili <= 300) ? 7 : (($data->jarak_domisili <= 500) ? 5 : (($data->jarak_domisili <= 700) ? 3 : 1)));
    
        // Kembalikan nilai-nilai yang sudah dinormalisasi
        return [
            'luas_rumah' => $luas_rumah,
            'gaji' => $gaji,
            'status_perkawinan' => $status_perkawinan,
            'jumlah_usia_lanjut' => $jumlah_usia_lanjut,
            'jarak_domisili' => $jarak_domisili,
        ];
    }

    
}