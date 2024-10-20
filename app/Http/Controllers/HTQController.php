<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHTQRequest;
use App\Models\HTQQuestions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HTQController extends Controller
{
    public function create()
    {
        $questions = HTQQuestions::all();
        $jenis = 'htq';
        return view('htq.create', compact('questions', 'jenis'));
    }

    public function store(StoreHTQRequest $request)
    {
        // dd($request->all());
        $hasil = DB::transaction(function () use ($request) {
            $validated = $request->validated();
            
            $depresiSum = array_sum([$validated['q1'], $validated['q2'], $validated['q3'], $validated['q4'], $validated['q5'], $validated['q6'], $validated['q7'], $validated['q8'], $validated['q9'], $validated['q10'], $validated['q11'], $validated['q12'], $validated['q13'], $validated['q14'], $validated['q15'], $validated['q16']]);
            $depresi = round($depresiSum / 16, 2);

            $totalSum = array_sum(array_values($validated));
            $total = round($totalSum / 16, 2);

            $hasil = auth()->user()->latestHasil()->first();

            $hasil->update([
                'status_pengerjaan' => 'selesai',
                'htq_depresiDSM4' => $depresi,
                'htq_total' => $total,
                'htq_waktu' => now(),
                'last_test' => 'htq',
            ]);

            $hasil->htqAnswers()->create(
                array_merge(
                    [
                        'depresi' => $depresi,
                        'total' => $total,
                    ],
                    $validated,
                ),
            );

            return $hasil;
        });

        return redirect()->route('test-finished', compact('hasil'));
    }
}
