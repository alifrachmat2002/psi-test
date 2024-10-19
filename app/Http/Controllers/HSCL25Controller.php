<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHSCL25Request;
use App\Models\HSCL25Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HSCL25Controller extends Controller
{
    public function create()
    {
        $questions = HSCL25Questions::all();
        $jenis = 'hscl25';
        return view('hscl25.create', compact('questions','jenis'));
    }

    public function store(StoreHSCL25Request $request)
    {
        // dd($request->all());
        $hasil = DB::transaction(function () use ($request) {
            $validated = $request->validated();

            $kecemasanSum = array_sum([
                $validated['q1'],
                $validated['q2'],
                $validated['q3'],
                $validated['q4'],
                $validated['q5'],
                $validated['q6'],
                $validated['q7'],
                $validated['q8'],
                $validated['q9'],
                $validated['q10'],
            ]);
            $kecemasan = round($kecemasanSum / 10, 2);

            $depresiSum = array_sum([
                $validated['q11'],
                $validated['q12'],
                $validated['q13'],
                $validated['q14'],
                $validated['q15'],
                $validated['q16'],
                $validated['q17'],
                $validated['q18'],
                $validated['q19'],
                $validated['q20'],
                $validated['q21'],
                $validated['q22'],
                $validated['q23'],
                $validated['q24'],
                $validated['q25'],
            ]);
            $depresi = round($depresiSum / 15, 2);

            $totalSum = $depresiSum + $kecemasanSum;
            $total = round($totalSum / 25, 2);

            $hasil = auth()
            ->user()
            ->latestHasil()
            ->first();

        $hasil->update([
                'status_pengerjaan' => 'belum selesai',
                'hscl25_kecemasan' => $kecemasan,
                'hscl25_depresiDSM4' => $depresi,
                'hscl25_total' => $total,
                'hscl25_waktu' => now(),
                'last_test' => 'hscl-25',
        ]);

        $hasil->hscl25Answers()
            ->create(array_merge(
                [
                    'kecemasan' => $kecemasan,
                    'depresi' => $depresi,
                    'total' => $total,
                ],
                $validated,
            ));

            return $hasil;
        });
        
        return redirect()->route('test-finished', compact('hasil'));

    }
}
