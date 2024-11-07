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
                'question' => 'Tiba-tiba merasa ketakutan tanpa sebab yang jelas (<em>Suddenly scared for no reason</em>)',
            ],
            [
                'id' => 2,
                'question' => 'Merasa ketakutan (<em>Feeling fearful</em>)',
            ],
            [
                'id' => 3,
                'question' => 'Limbung, pening, atau lemas.
(<em>Faintness, dizziness/ weakness</em>)',
            ],
            [
                'id' => 4,
                'question' => 'Kegelisahan atau gemetar di dalam diri.
(<em>Nervousness or shakiness inside</em>)',
            ],
            [
                'id' => 5,
                'question' => 'Jantung berdebar kuat atau amat cepat.
Heart pounding or racing (<em>heart beating very fast</em>)',
            ],
            [
                'id' => 6,
                'question' => 'Gemetaran.
(<em>Trembling</em>)',
            ],
            [
                'id' => 7,
                'question' => 'Merasa tegang atau terhimpit.
(<em>Feeling tense or keyed up</em>)',
            ],
            [
                'id' => 8,
                'question' => 'Sakit Kepala.
(<em>Headaches</em>)',
            ],
            [
                'id' => 9,
                'question' => 'Saat merasa amat ketakutan atau panik.
(<em>Spells of terror or panic</em>)',
            ],
            [
                'id' => 10,
                'question' => 'Merasa resah, tidak dapat diam tenang.
(<em>Feeling restless, can\'t sit still</em>)',
            ],
            [
                'id' => 11,
                'question' => 'Merasa kurang bertenaga, melamban.
(<em>Feeling low in energy, slowed down</em>)',
            ],
            [
                'id' => 12,
                'question' => 'Mempersalahkan diri sendiri untuk berbagai hal.
(<em>Blaming yourself for things</em>)',
            ],
            [
                'id' => 13,
                'question' => 'Mudah menangis.
(<em>Crying easily</em>)',
            ],
            [
                'id' => 14,
                'question' => 'Kehilangan minat atau kesenangan seksual
tidak mau berada di antara perempuan atau laki-laki, lawan jenis.
(<em>Loss of sexual interest or pleasure</em>)',
            ],
            [
                'id' => 15,
                'question' => 'Selera makan terganggu (berkurang).
(<em>Poor appetite</em>)',
            ],
            [
                'id' => 16,
                'question' => 'Sulit tidur, mudah terbangun/ terjaga.
(<em>Difficulty falling asleep, staying asleep</em>)',
            ],
            [
                'id' => 17,
                'question' => 'Merasa tidak punya harapan mengenai masa depan.
(<em>Feeling hopeless about the future</em>)',
            ],
            [
                'id' => 18,
                'question' => 'Merasa sedih.
(<em>Feeling sad</em>)',
            ],
            [
                'id' => 19,
                'question' => 'Merasa kesepian.
(<em>Feeling lonely.</em>)',
            ],
            [
                'id' => 20,
                'question' => 'Berpikir untuk mengakhiri hidup anda.
(<em>Thought of ending your life.</em>)',
            ],
            [
                'id' => 21,
                'question' => 'Merasa terperangkap atau terjebak, tidak dapat keluar dari suatu situasi.
(<em>Feeling of being trapped or caught </em>)',    
            ],
            [
                'id' => 22,
                'question' => 'Terlalu mengkhawatirkan banyak hal.
(<em>Worry too much about things</em>)',
            ],
            [
                'id' => 23,
                'question' => 'Merasa tidak tertarik atau tidak berminat terhadap segala hal.
(<em>Feeling no interest in things</em>)',
            ],
            [
                'id' => 24,
                'question' => 'Merasa bahwa segala sesuatu memerlukan usaha keras atau terasa berat.
(<em>Feeling everything is an effort</em>)',
            ],
            [
                'id' => 25,
                'question' => 'Merasa tidak berharga.
(<em>Feeling of worthlessness</em>)',
            ],
        ];

        DB::table('ref_qhscl25')->insert($questions);
    }
}
