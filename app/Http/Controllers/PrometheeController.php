<?php

namespace App\Http\Controllers;

use App\Models\Alternatives;
use App\Models\AlternativesResult;
use Illuminate\Http\Request;
use App\Models\Criteria;
use App\Models\Warga;

class PrometheeController extends Controller
{
    public function calculate()
    {
        $alternatives = Alternatives::all();

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

        $warga = Warga::get();
        return view('spk.promethee', compact('netFlow', 'alternatives', 'warga'));
    }

    public function storeAlternativesResults(Request $request)
    {
        $data = $request->input('data');

        foreach ($data as $item) {
            if (isset($item['alternative_id']) && isset($item['net_flow'])) {
                AlternativesResult::create([
                    'alternative_id' => $item['alternative_id'],
                    'net_flow' => $item['net_flow'],
                ]);
            } else {
                return redirect()->back()->with('error', 'Data tidak valid.');
            }
        }
        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }
}
