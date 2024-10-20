<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDASS21Request;
use App\Models\DASS21Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class DASS21Controller extends Controller
{
    public function create()
    {
        if (Gate::denies('can-dass21')) {
            return redirect()->route('dashboard');
        }
        $questions = DASS21Questions::all();
        $jenis = 'dass21';
        return view('dass21.create', compact('questions','jenis'));
    }

    public function store(StoreDASS21Request $request)
    {
        $hasil = DB::transaction(function () use ($request) {
            $validated = $request->validated();
        $depresi = array_sum([
            $validated['q3'],
            $validated['q5'],
            $validated['q10'],
            $validated['q13'],
            $validated['q16'],
            $validated['q17'],
            $validated['q21'],
        ]) * 2;

        switch ($depresi) {
            case $depresi < 10:
                $keteranganDepresi = 'Normal';
                break;
            case $depresi < 14:
                $keteranganDepresi = 'Ringan';
                break;
            case $depresi < 21:
                $keteranganDepresi = 'Sedang';
                break;
            case $depresi < 28:
                $keteranganDepresi = 'Sedang';
                break;
            default:
                $keteranganDepresi = 'Sangat Parah';
                break;
        }

        $kecemasan = array_sum([
            $validated['q2'],
            $validated['q4'],
            $validated['q7'],
            $validated['q9'],
            $validated['q15'],
            $validated['q19'],
            $validated['q20'],
        ]) * 2;

        switch($kecemasan) {
            case $kecemasan < 8:
                $keteranganKecemasan = 'Normal';
                break;
            case $kecemasan < 10:
                $keteranganKecemasan = 'Ringan';
                break;
            case $kecemasan < 15:
                $keteranganKecemasan = 'Sedang';
                break;
            case $kecemasan < 20:
                $keteranganKecemasan = 'Parah';
                break;
            default:
                $keteranganKecemasan = 'Sangat Parah';
                break;
        }

        $stress = array_sum([
            $validated['q1'],
            $validated['q6'],
            $validated['q8'],
            $validated['q11'],
            $validated['q12'],
            $validated['q14'],
            $validated['q18'],
        ]) * 2;

        switch($stress) {
            case $stress < 15:
                $keteranganStress = 'Normal';
                break;
            case $stress < 19:
                $keteranganStress = 'Ringan';
                break;
            case $stress < 26:
                $keteranganStress = 'Sedang';
                break;
            case $stress < 34:
                $keteranganStress = 'Parah';
                break;
            default:
                $keteranganStress = 'Sangat Parah';
                break;
        }

        $waktu = now();

        $statusPengerjaan = 'belum selesai';
        if ($kecemasan < 14 && $stress < 19 && $depresi < 10) {
            $statusPengerjaan = 'selesai';
        }

        $hasil = auth()
            ->user()
            ->latestHasil()
            ->first();

        $hasil->update([
                'status_pengerjaan' => $statusPengerjaan,
                'dass21_kecemasan' => $kecemasan,
                'dass21_stress' => $stress,
                'dass21_depresi' => $depresi,
                'dass21_waktu' => $waktu,
                'last_test' => 'dass-21',
        ]);
        // dd();
        $hasil->dass21Answers()
            ->create(array_merge(
                [
                    'kecemasan' => $kecemasan,
                    'stress' => $stress,
                    'depresi' => $depresi,
                    'keterangan_kecemasan' => $keteranganKecemasan,
                    'keterangan_stress' => $keteranganStress,
                    'keterangan_depresi' => $keteranganDepresi,
                ],
                $validated,
            ));

            return $hasil;
        });
        
        return redirect()->route('test-finished', compact('hasil'));

    }
}
