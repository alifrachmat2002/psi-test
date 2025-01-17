<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $query = "SELECT
                    COUNT(DISTINCT h.user_id) AS jumlah_responden,
                    SUM(h.jumlah_tes) AS jumlah_tes,
                    COUNT(CASE WHEN h.ghq_total IS NOT NULL THEN 1 END) AS jumlah_ghq,
                    COUNT(CASE WHEN h.ghq_total < 10 THEN 1 END) AS ghq_healthy,
                    COUNT(CASE WHEN h.ghq_total >= 10 THEN 1 END) AS ghq_need_attention,
                    COUNT(CASE WHEN h.dass21_waktu IS NOT NULL THEN 1 END) AS jumlah_dass21,
                    COUNT(CASE WHEN dass21_depresi >= 21 THEN 1 END) as dass21_depresi, 
                    COUNT(CASE WHEN dass21_kecemasan >= 20 THEN 1 END) as dass21_cemas, 
                    COUNT(CASE WHEN dass21_stress >= 34 THEN 1 END) as dass21_stress,
                    COUNT(CASE WHEN h.hscl25_waktu IS NOT NULL THEN 1 END) AS jumlah_hscl25,
                    COUNT(CASE WHEN hscl25_total >= 1.75 THEN 1 END) as hscl25_mixed_anxiety_depression,
                    COUNT(CASE WHEN hscl25_depresiDSM4 >= 1.75 THEN 1 END) as hscl25_depresi,
                    COUNT(CASE WHEN hscl25_kecemasan >= 1.75 THEN 1 END) as hscl25_kecemasan,
                    COUNT(CASE WHEN h.htq_waktu IS NOT NULL THEN 1 END) AS jumlah_htq,
                    COUNT(CASE WHEN hscl25_depresiDSM4 >= 1.75 AND htq_depresiDSM4 > 2.5 THEN 1 END) as htq_depresi_trauma, 
                    COUNT(CASE WHEN hscl25_kecemasan >= 1.75 AND htq_total > 2.5 THEN 1 END) as htq_cemas_trauma
                FROM (
                    SELECT
                        h2.jumlah_tes, h1.*
                    FROM
                        hasils h1
                    INNER JOIN (
                        SELECT
                            DISTINCT hasils.user_id,
                            COUNT(hasils.id) AS jumlah_tes,
                            MAX(CONCAT(hasils.created_at,'-',hasils.id)) AS latest_test
                        FROM
                            hasils
                        LEFT JOIN
                            users ON hasils.user_id = users.id
                        WHERE
                            users.level != 1
                            AND
                            hasils.status_pengerjaan = 'selesai'
                            -- AND
                            -- users.email NOT LIKE '%@example%'
                            "
                            . ($request->start_date && $request->end_date ? " AND hasils.created_at BETWEEN '$request->start_date' AND '$request->end_date'" : '') .                            
                            "
                        GROUP BY
                            user_id
                    ) h2
                    ON h1.user_id = h2.user_id AND CONCAT(h1.created_at,'-',h1.id) = h2.latest_test
                ) h" . ($request->start_date && $request->end_date ? " WHERE h.created_at BETWEEN '$request->start_date' AND '$request->end_date'" : '') . ";";

        $data = DB::select($query)[0];

        return response()->json([
            'success' => true,
            'data' => [
                'jumlah_responden' => $data->jumlah_responden,
                'jumlah_tes' => $data->jumlah_tes,
                'jumlah_ghq' => $data->jumlah_ghq,
                'jumlah_dass21' => $data->jumlah_dass21,
                'jumlah_hscl25' => $data->jumlah_hscl25,
                'jumlah_htq' => $data->jumlah_htq,
                'ghq_healthy' => $data->ghq_healthy,
                'ghq_need_attention' => $data->ghq_need_attention,
                'dass21_depresi' => $data->dass21_depresi,
                'dass21_cemas' => $data->dass21_cemas,
                'dass21_stress' => $data->dass21_stress,
                'hscl25_mixed_anxiety_depression' => $data->hscl25_mixed_anxiety_depression,
                'hscl25_depresi' => $data->hscl25_depresi,
                'hscl25_kecemasan' => $data->hscl25_kecemasan,
                'htq_depresi_trauma' => $data->htq_depresi_trauma,
                'htq_cemas_trauma' => $data->htq_cemas_trauma,
            ],
        ]);
    }
}
