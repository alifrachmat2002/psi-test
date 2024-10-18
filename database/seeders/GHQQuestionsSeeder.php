<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GHQQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'id' => 1,
                'question' => 'Bisa berkonsentrasi pada apapun yang saya kerjakan',
                'pil1' => 'Lebih baik dari biasanya',
                'pil2' => 'Sama seperti biasanya',
                'pil3' => 'Kurang dari biasanya',
                'pil4' => 'Sangat kurang dari biasanya',
            ],
            [
                'id' => 2,
                'question' => 'Susah tidur karena khawatir',
                'pil1' => 'Sama sekali tidak',
                'pil2' => 'Tidak lebih dari biasanya',
                'pil3' => 'Agak lebih dari biasanya',
                'pil4' => 'Sangat lebih dari biasanya',
            ],
            [
                'id' => 3,
                'question' => 'Saya merasa memiliki peran dalam banyak hal',
                'pil1' => 'Lebih berperan dari biasanya',
                'pil2' => 'Sama seperti biasanya',
                'pil3' => 'Kurang berperan dari biasanya',
                'pil4' => 'Sangat kurang berperan',
            ],
            [
                'id' => 4,
                'question' => 'Merasa mampu membuat keputusan dalam banyak hal',
                'pil1' => 'Lebih mampu dari biasanya',
                'pil2' => 'Sama seperti biasanya',
                'pil3' => 'Kurang mampu dari biasanya',
                'pil4' => 'Sangat kurang mampu',
            ],
            [
                'id' => 5,
                'question' => 'Saya terus-menerus merasa tertekan',
                'pil1' => 'Sama sekali tidak',
                'pil2' => 'Tidak lebih dari biasanya',
                'pil3' => 'Agak lebih dari biasanya',
                'pil4' => 'Sangat lebih dari biasanya',
            ],
            [
                'id' => 6,
                'question' => 'Merasa tidak mampu mengatasi berbagai kesulitan',
                'pil1' => 'Sama sekali tidak',
                'pil2' => 'Tidak lebih dari biasanya',
                'pil3' => 'Agak lebih dari biasanya',
                'pil4' => 'Sangat lebih dari biasanya',
            ],
            [
                'id' => 7,
                'question' => 'Menikmati kegiatan sehari-hari',
                'pil1' => 'Lebih dari biasanya',
                'pil2' => 'Sama seperti biasanya',
                'pil3' => 'Kurang begitu mampu dari biasanya',
                'pil4' => 'Sangat kurang dari biasanya',
            ],
            [
                'id' => 8,
                'question' => 'Mampu menghadapi masalah yang ada',
                'pil1' => 'Lebih mampu dari biasanya',
                'pil2' => 'Sama seperti biasanya',
                'pil3' => 'Kurang mampu dari biasanya',
                'pil4' => 'Sangat kurang mampu',
            ],
            [
                'id' => 9,
                'question' => 'Merasa tidak bahagia dan tertekan',
                'pil1' => 'Sama sekali tidak',
                'pil2' => 'Tidak lebih dari biasanya',
                'pil3' => 'Agak lebih dari biasanya',
                'pil4' => 'Sangat lebih dari biasanya',
            ],
            [
                'id' => 10,
                'question' => 'Merasa kehilangan kepercayaan diri',
                'pil1' => 'Sama sekali tidak',
                'pil2' => 'Tidak lebih dari biasanya',
                'pil3' => 'Agak lebih dari biasanya',
                'pil4' => 'Sangat lebih dari biasanya',
            ],
            [
                'id' => 11,
                'question' => 'Terpikir bahwa saya orang yang tidak berguna',
                'pil1' => 'Sama sekali tidak',
                'pil2' => 'Tidak lebih dari biasanya',
                'pil3' => 'Agak lebih dari biasanya',
                'pil4' => 'Sangat lebih dari biasanya',
            ],
            [
                'id' => 12,
                'question' => 'Merasa bahagia dengan segala hal',
                'pil1' => 'Lebih bahagia dari biasanya',
                'pil2' => 'Kira-kira sama seperti biasanya',
                'pil3' => 'Kurang dari biasanya',
                'pil4' => 'Sangat kurang dari biasanya',
            ],
        ];

        DB::table('ref_qghq12')->insert($questions);
    }
}
