<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hasil>
 */
class HasilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $testType = ['ghq12', 'dass-21', 'hscl-25', 'htq'][rand(0, 3)];
        $testTime = Carbon::now()->subDays(rand(0, 30));
        $baseData = [
            'user_id' => User::inRandomOrder()->first()->id,
            'status_pengerjaan' => 'selesai',
            'last_test' => $testType,
            'agreed_to_share_data' => (bool) rand(0, 1),
            'created_at' => $testTime,
            'updated_at' => Carbon::now(),
        ];
        $testData = [
            'ghq_total' => null,
            'ghq_waktu' => null,
            'dass21_depresi' => null,
            'dass21_kecemasan' => null,
            'dass21_stress' => null,
            'dass21_waktu' => null,
            'hscl25_kecemasan' => null,
            'hscl25_depresiDSM4' => null,
            'hscl25_total' => null,
            'hscl25_waktu' => null,
            'htq_depresiDSM4' => null,
            'htq_total' => null,
            'htq_waktu' => null,
        ];
        switch ($testType) {
            case 'ghq12':
                $testData['ghq_total'] = rand(0, 36);
                $testData['ghq_waktu'] = $testTime;
                break;

            case 'dass-21':
                $testData['ghq_total'] = rand(0, 36);
                $testData['ghq_waktu'] = $testTime;
                $testData['dass21_depresi'] = rand(0, 42);
                $testData['dass21_kecemasan'] = rand(0, 42);
                $testData['dass21_stress'] = rand(0, 42);
                $testData['dass21_waktu'] = $testTime;
                break;

            case 'hscl-25':
                $testData['ghq_total'] = rand(0, 36);
                $testData['ghq_waktu'] = $testTime;
                $testData['dass21_depresi'] = rand(0, 42);
                $testData['dass21_kecemasan'] = rand(0, 42);
                $testData['dass21_stress'] = rand(0, 42);
                $testData['dass21_waktu'] = $testTime;
                $testData['hscl25_kecemasan'] = round(rand(10, 40) / 10, 1);
                $testData['hscl25_depresiDSM4'] = round(rand(10, 40) / 10, 1);
                $testData['hscl25_total'] = round(rand(10, 40) / 10, 1);
                $testData['hscl25_waktu'] = $testTime;
                break;

            case 'htq':
                $testData['ghq_total'] = rand(0, 36);
                $testData['ghq_waktu'] = $testTime;
                $testData['dass21_depresi'] = rand(0, 42);
                $testData['dass21_kecemasan'] = rand(0, 42);
                $testData['dass21_stress'] = rand(0, 42);
                $testData['dass21_waktu'] = $testTime;
                $testData['hscl25_kecemasan'] = round(rand(10, 40) / 10, 1);
                $testData['hscl25_depresiDSM4'] = round(rand(10, 40) / 10, 1);
                $testData['hscl25_total'] = round(rand(10, 40) / 10, 1);
                $testData['hscl25_waktu'] = $testTime;
                $testData['htq_depresiDSM4'] = round(rand(10, 40) / 10, 1);
                $testData['htq_total'] = round(rand(10, 40) / 10, 1);
                $testData['htq_waktu'] = $testTime;
                break;
        }
        return array_merge($baseData, $testData);
    }
}
