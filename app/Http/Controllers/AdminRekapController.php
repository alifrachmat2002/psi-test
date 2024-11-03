<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use Illuminate\Http\Request;

class AdminRekapController extends Controller
{
    public function index()
    {
        $hasils = Hasil::where('status_pengerjaan', 'selesai')->where('agreed_to_share_data', true)->whereNot('last_test', 'ghq12')->get();
        return view('admin.rekap.index', compact('hasils'));
    }

    public function getBarChartData(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'sometimes|date|',
            'end_date' => 'sometimes|date|after:start_date',
        ]);
        $ghqData = Hasil::selectRaw('COUNT(CASE WHEN ghq_total < 10 THEN 1 END) as ghq_healthy, COUNT(CASE WHEN ghq_total >= 10 THEN 1 END) as ghq_need_attention')
            ->when($request->start_date, function ($query) use ($request) {
                $query->whereDate('ghq_waktu', '>=', $request->start_date);
            })
            ->when($request->end_date, function ($query) use ($request) {
                $query->whereDate('ghq_waktu', '<=', $request->end_date);
            })
            ->first();

        $dass21data = Hasil::selectRaw('COUNT(CASE WHEN dass21_depresi >= 21 THEN 1 END) as dass21_depresi, COUNT(CASE WHEN dass21_kecemasan >= 20 THEN 1 END) as dass21_cemas, COUNT(CASE WHEN dass21_stress >= 34 THEN 1 END) as dass21_stress')
            ->when($request->start_date, function ($query) use ($request) {
                $query->whereDate('dass21_waktu', '>=', $request->start_date);
            })
            ->when($request->end_date, function ($query) use ($request) {
                $query->whereDate('dass21_waktu', '<=', $request->end_date);
            })
            ->first();

        $hscl25data = Hasil::selectRaw('COUNT(CASE WHEN hscl25_total >= 1.75 THEN 1 END) as hscl25_mixed_anxiety_depression, COUNT(CASE WHEN hscl25_depresiDSM4 >= 1.75 THEN 1 END) as hscl25_depresi, COUNT(CASE WHEN hscl25_kecemasan >= 1.75 THEN 1 END) as hscl25_kecemasan')
            ->when($request->start_date, function ($query) use ($request) {
                $query->whereDate('hscl25_waktu', '>=', $request->start_date);
            })
            ->when($request->end_date, function ($query) use ($request) {
                $query->whereDate('hscl25_waktu', '<=', $request->end_date);
            })
            ->first();

        $htqData = Hasil::selectRaw('COUNT(CASE WHEN hscl25_depresiDSM4 >= 1.75 AND htq_depresiDSM4 > 2.5 THEN 1 END) as htq_depresi_trauma, COUNT(CASE WHEN hscl25_kecemasan >= 1.75 AND htq_total > 2.5 THEN 1 END) as htq_cemas_trauma')
            ->when($request->start_date, function ($query) use ($request) {
                $query->whereDate('htq_waktu', '>=', $request->start_date);
            })
            ->when($request->end_date, function ($query) use ($request) {
                $query->whereDate('htq_waktu', '<=', $request->end_date);
            })
            ->first();

        return response()->json([
            'success' => true,
            'data' => [
                'ghq_healthy' => $ghqData->ghq_healthy,
                'ghq_need_attention' => $ghqData->ghq_need_attention,
                'dass21_depresi' => $dass21data->dass21_depresi,
                'dass21_cemas' => $dass21data->dass21_cemas,
                'dass21_stress' => $dass21data->dass21_stress,
                'hscl25_mixed_anxiety_depression' => $hscl25data->hscl25_mixed_anxiety_depression,
                'hscl25_depresi' => $hscl25data->hscl25_depresi,
                'hscl25_kecemasan' => $hscl25data->hscl25_kecemasan,
                'htq_depresi_trauma' => $htqData->htq_depresi_trauma,
                'htq_cemas_trauma' => $htqData->htq_cemas_trauma,
            ],
        ]);
    }
}
