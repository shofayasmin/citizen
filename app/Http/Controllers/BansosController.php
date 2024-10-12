<?php

namespace App\Http\Controllers;

use App\Models\Bansos;
use Illuminate\Http\Request;
use App\Models\Alternatives;
use App\Models\Criteria;


class BansosController extends Controller
{
    

    public function informasi()
    {
        $data = Bansos::paginate(10);
        return view('Bansos.informasi',compact('data'));
    }
    public function pengajuan()
    {
        return view('Bansos.pengajuan');
    }
    public function manage()
    {
        $alternatives = Alternatives::all();
        $bansos = Bansos::paginate(10);

        // Mengambil bobot kriteria dari tabel criteria
        $criteriaWeights = [
            'jumlah_usia_produktif'     => Criteria::where('name', 'Jumlah Usia Produktif')->first()->weight,
            'jumlah_anggota_keluarga'   => Criteria::where('name', 'Jumlah Anggota Keluarga')->first()->weight,
            'kondisi_rumah'             => Criteria::where('name', 'Kondisi Rumah')->first()->weight,
            'jumlah_usia_lanjut'        => Criteria::where('name', 'Jumlah Usia Lanjut')->first()->weight,
            'pendapatan_total'          => Criteria::where('name', 'Pendapatan')->first()->weight,
        ];

        // Step 1: Calculate the preference for each pair of alternatives for each criterion
        $preferenceMatrix = [];
        foreach ($criteriaWeights as $criterion => $weight) {
            foreach ($alternatives as $a1) {
                foreach ($alternatives as $a2) {
                    if ($a1->id !== $a2->id) {
                        $valueA1 = $a1->$criterion;
                        $valueA2 = $a2->$criterion;

                        $preference = $valueA1 - $valueA2; // Adjust this calculation as per preference function
                        $preferenceMatrix[$criterion][$a1->id][$a2->id] = $preference > 0 ? $preference : 0;
                    }
                }
            }
        }

        // Step 2: Aggregate the preference values
        $aggregatedPreferenceMatrix = [];
        foreach ($alternatives as $a1) {
            foreach ($alternatives as $a2) {
                if ($a1->id !== $a2->id) {
                    $aggregatedPreference = 0;
                    foreach ($criteriaWeights as $criterion => $weight) {
                        $aggregatedPreference += $weight * $preferenceMatrix[$criterion][$a1->id][$a2->id];
                    }
                    $aggregatedPreferenceMatrix[$a1->id][$a2->id] = $aggregatedPreference;
                }
            }
        }

        // Step 3: Calculate the leaving and entering flows
        $leavingFlow = [];
        $enteringFlow = [];
        foreach ($alternatives as $a1) {
            $leavingSum = 0;
            $enteringSum = 0;
            foreach ($alternatives as $a2) {
                if ($a1->id !== $a2->id) {
                    $leavingSum += $aggregatedPreferenceMatrix[$a1->id][$a2->id];
                    $enteringSum += $aggregatedPreferenceMatrix[$a2->id][$a1->id];
                }
            }
            $leavingFlow[$a1->id] = $leavingSum / (count($alternatives) - 1);
            $enteringFlow[$a1->id] = $enteringSum / (count($alternatives) - 1);
        }

        // Step 4: Calculate the net flow
        $netFlow = [];
        foreach ($alternatives as $a) {
            $netFlow[$a->id] = $leavingFlow[$a->id] - $enteringFlow[$a->id];
        }

        // Step 5: Rank the alternatives
        arsort($netFlow);

        // Step 6: Get the top candidates based on jumlah_bansos
        $jumlahBansos = $bansos->first()->jumlah_bansos;
        $topCandidates = array_slice(array_keys($netFlow), 0, $jumlahBansos, true);
        
        // Ambil ID penerima bansos berdasarkan top candidates
        $penerimaBansosIds = array_keys($topCandidates);

        // Ambil data lengkap penerima bansos berdasarkan ID yang didapat
        $penerimaBansos = Alternatives::whereIn('id', $penerimaBansosIds)->get();

        
        return view('Bansos.manage', compact('netFlow', 'alternatives','bansos','topCandidates','penerimaBansos'));

    }
    public function lurah()
    {
        return view('Bansos.lurah');
    }
}
