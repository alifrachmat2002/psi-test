<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HSCL25QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'id' => 1,
                'question' => 'Tiba-tiba merasa ketakutan tanpa sebab yang jelas (Suddenly scared for no reason)',
            ],
            [
                'id' => 2,
                'question' => 'Merasa ketakutan (Feeling fearful)',
            ],
            [
                'id' => 3,
                'question' => 'Limbung, pening, atau lemas.
(Faintness, dizziness/ weakness)',
            ],
            [
                'id' => 4,
                'question' => 'Kegelisahan atau gemetar di dalam diri.
(Nervousness or shakiness inside)',
            ],
            [
                'id' => 5,
                'question' => 'Jantung berdebar kuat atau amat cepat.
Heart pounding or racing (heart beating very fast)',
            ],
            [
                'id' => 6,
                'question' => 'Gemetaran.
Trembling',
            ],
            [
                'id' => 7,
                'question' => 'Merasa tegang atau terhimpit.
Feeling tense or keyed up',
            ],
            [
                'id' => 8,
                'question' => 'Sakit Kepala.
Headaches',
            ],
            [
                'id' => 9,
                'question' => 'Saat merasa amat ketakutan atau panik.
Spells of terror or panic',
            ],
            [
                'id' => 10,
                'question' => 'Merasa resah, tidak dapat diam tenang.
Feeling restless, can\'t sit still',
            ],
            [
                'id' => 11,
                'question' => 'Merasa kurang bertenaga, melamban.
Feeling low in energy, slowed down',
            ],
            [
                'id' => 12,
                'question' => 'Mempersalahkan diri sendiri untuk berbagai hal.
Blaming yourself for things',
            ],
            [
                'id' => 13,
                'question' => 'Mudah menangis.
Crying easily',
            ],
            [
                'id' => 14,
                'question' => 'Kehilangan minat atau kesenangan seksual
(tidak mau berada di antara perempuan atau laki-laki, lawan jenis).
Loss of sexual interest or pleasure',
            ],
            [
                'id' => 15,
                'question' => 'Selera makan terganggu (berkurang).
Poor appetite',
            ],
            [
                'id' => 16,
                'question' => 'Sulit tidur, mudah terbangun/ terjaga.
Difficulty falling asleep, staying asleep',
            ],
            [
                'id' => 17,
                'question' => 'Merasa tidak punya harapan mengenai masa depan.
Feeling hopeless about the future',
            ],
            [
                'id' => 18,
                'question' => 'Merasa sedih.
Feeling sad',
            ],
            [
                'id' => 19,
                'question' => 'Merasa kesepian.
Feeling lonely.',
            ],
            [
                'id' => 20,
                'question' => 'Berpikir untuk mengakhiri hidup anda.
Thought of ending your life',
            ],
            [
                'id' => 21,
                'question' => 'Merasa terperangkap atau terjebak, tidak dapat keluar dari suatu situasi.
Feeling of being trapped or caught',
            ],
            [
                'id' => 22,
                'question' => 'Terlalu mengkhawatirkan banyak hal.
Worry too much about things',
            ],
            [
                'id' => 23,
                'question' => 'Merasa tidak tertarik atau tidak berminat terhadap segala hal.
Feeling no interest in things',
            ],
            [
                'id' => 24,
                'question' => 'Merasa bahwa segala sesuatu memerlukan usaha keras atau terasa berat.
Feeling everything is an effort',
            ],
            [
                'id' => 25,
                'question' => 'Merasa tidak berharga.
Feeling of worthlessness',
            ],
        ];

        DB::table('ref_qhscl25')->insert($questions);
    }
}
