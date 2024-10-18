<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DASS21QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'id' => 1,
                'question' => 'Saya sulit menenangkan diri'
            ],
            [
                'id' => 2,
                'question' => 'Saya menyadari mulut saya kering'
            ],
            [
                'id' => 3,
                'question' => 'Saya tidak pernah mengalami perasaan positif sama sekali'
            ],
            [
                'id' => 4,
                'question' => 'Saya mengalami kesulitan bernafas (contoh: bernafas cepat dan berat, sulit bernafas saat tidak ada meskipun tidak melakukan aktivitas fisik)'
            ],
            [
                'id' => 5,
                'question' => 'Saya kesulitan untuk berinisiatif melakukan sesuatu'
            ],
            [
                'id' => 6,
                'question' => 'Saya cenderung bereaksi berlebihan terhadap situasi'
            ],
            [
                'id' => 7,
                'question' => 'Saya mengalami gemetar (contoh: di tangan)'
            ],
            [
                'id' => 8,
                'question' => 'Saya merasa bahwa saya menggunakan banyak energi untuk gelisah'
            ],
            [
                'id' => 9,
                'question' => 'Saya mengkhawatirkan tentang situasi yang dapat mengakibatkan saya panik dan membuat diri saya tampak bodoh '
            ],
            [
                'id' => 10,
                'question' => 'Saya merasa bahwa tidak ada hal baik yang saya tunggu di masa depan'
            ],
            [
                'id' => 11,
                'question' => 'Saya mendapati diri saya merasa gelisah'
            ],
            [
                'id' => 12,
                'question' => 'Saya sulit untuk tenang / rileks'
            ],
            [
                'id' => 13,
                'question' => 'Saya merasa rendah diri dan sedih'
            ],
            [
                'id' => 14,
                'question' => 'Saya tidak toleran terhadap apapun yang mengganggu saya dari mengerjakan sesuatu yang sedang saya kerjakan'
            ],
            [
                'id' => 15,
                'question' => 'Saya merasa mudah untuk panik'
            ],
            [
                'id' => 16,
                'question' => 'Saya tidak bisa antusias terhadap apapun'
            ],
            [
                'id' => 17,
                'question' => 'Saya merasa saya tidak berharga sebagai seseorang'
            ],
            [
                'id' => 18,
                'question' => 'Saya merasa saya agak mudah tersinggung'
            ],
            [
                'id' => 19,
                'question' => 'Saya menyadari reaksi jantung saya saat tidak ada aktivitas fisik (contoh: merasakan peningkatan denyut jantung, jantung tidak berdetak 1 kali)'
            ],
            [
                'id' => 20,
                'question' => 'Saya merasa takut'
            ],
            [
                'id' => 21,
                'question' => 'Saya merasa bahwa hidup itu tidak berarti'
            ],
        ];

        DB::table('ref_qdass21')->insert($questions);
    }
}
