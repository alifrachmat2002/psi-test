<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HTQQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'id' => 1,
                'question' => 'Pikiran atau ingatan yang berulang kali muncul mengenai kejadian yang paling menyakitkan atau mengerikan. (<em>Recurrent thoughts or memories of the most hurtful or terrifying events</em>)',
            ],
            [
                'id' => 2,
                'question' => 'Merasa seakan-akan peristiwa itu terjadi lagi. (<em>Feeling as though the event is happening again</em>)',
            ],
            [
                'id' => 3,
                'question' => 'Mimpi buruk berulang kali. (<em>Recurrent nightmares</em>)',
            ],
            [
                'id' => 4,
                'question' => 'Merasa ada jarak, tidak dapat akrab atau menarik (memisahkan) diri dari orang banyak. (<em>Feeling detached or withdrawn from people</em>)',
            ],
            [
                'id' => 5,
                'question' => 'Tidak dapat merasakan suatu perasaan (emosi) apa pun. (<em>Unable to feel emotions</em>)',
            ],
            [
                'id' => 6,
                'question' => 'Merasa tegang, gugup, mudah terkejut. (<em>Feeling jumpy, easily startled</em>)',
            ],
            [
                'id' => 7,
                'question' => 'Kesulitan berkonsentrasi (memusatkan perhatian). (<em>Difficulty concentrating</em>)',
            ],
            [
                'id' => 8,
                'question' => 'Sulit tidur. (<em>Trouble sleeping</em>)',
            ],
            [
                'id' => 9,
                'question' => 'Merasa selalu waspada, berjaga-jaga (seakan-akan mengantisipasi ada hal buruk yang akan terjadi). (<em>Feeling on guard</em>)',
            ],
            [
                'id' => 10,
                'question' => 'Mudah tersinggung atau meledak marah. (<em>Feeling irritable or having outbursts of anger</em>)',
            ],
            [
                'id' => 11,
                'question' => 'Menghindari kegiatan yang mengingatkan kepada peristiwa yang paling menyakitkan atau traumatis. (<em>Avoiding activities that remind you of the most hurtful or traumatic events</em>)',
            ],
            [
                'id' => 12,
                'question' => 'Tidak mampu mengingat sebagian dari pengalaman yang paling menyakitkan atau traumatis. (<em>Inability to remember parts of the most hurtful or traumatic events</em>)',
            ],
            [
                'id' => 13,
                'question' => 'Kurang berminat atau kurang tertarik untuk melakukan kegiatan sehari-hari. (<em>Less interest in daily activities</em>)',
            ],
            [
                'id' => 14,
                'question' => 'Merasa seakan-akan anda tidak memiliki masa depan. (<em>Feeling as if you don\'t have a future</em>)',
            ],
            [
                'id' => 15,
                'question' => 'Menghindari pikiran atau perasaan yang berhubungan dengan peristiwa traumatik/menyakitkan. (<em>Avoiding thoughts or feelings associated with the traumatic or hurtful event</em>)',
            ],
            [
                'id' => 16,
                'question' => 'Reaksi emosional atau fisik yang tiba-tiba ketika teringat pada peristiwa yang paling menyakitkan atau traumatis. (<em>Sudden emotional or physical reaction when reminded of the most hurtful or traumatic events</em>)',
            ],
            [
                'id' => 17,
                'question' => 'Merasa bahwa anda tidak lagi mampu melakukan hal-hal yang biasa anda lakukan dahulu. (<em>Feeling that you cannot do some things that you used to do before</em>)',
            ],
            [
                'id' => 18,
                'question' => 'Mengalami kesulitan menghadapi atau menyesuaikan diri terhadap situasi baru. (<em>Having difficulty dealing with new situations</em>)',
            ],
            [
                'id' => 19,
                'question' => 'Merasa amat lelah. (<em>Feeling plenty tired</em>)',
            ],
            [
                'id' => 20,
                'question' => 'Merasa nyeri atau sakit pada tubuh. (<em>Bodily pain</em>)',
            ],
            [
                'id' => 21,
                'question' => 'Terganggu oleh berbagai macam keluhan atau masalah fisik. (<em>Troubled by physical problems</em>)',
            ],
            [
                'id' => 22,
                'question' => 'Sulit mengingat. (<em>Poor memory</em>)',
            ],
            [
                'id' => 23,
                'question' => 'Pernah tahu sendiri/diberi tahu orang lain bahwa anda melakukan sesuatu hal yang tidak anda ingat. (<em>Finding out or being told by other people that you have done something you cannot remember</em>)',
            ],
            [
                'id' => 24,
                'question' => 'Kesulitan memusatkan perhatian. (<em>Difficulty paying attention</em>)',
            ],
            [
                'id' => 25,
                'question' => 'Merasa seakan-akan anda terpecah menjadi dua orang dan salah satunya memperhatikan apa yang sedang dilakukan oleh yang lainnya. (<em>Feeling as if you are split into two people and one of you is watching what the other is doing</em>)',
            ],
            [
                'id' => 26,
                'question' => 'Merasa tidak mampu membuat rencana harian. (<em>Feeling unable to make daily plans</em>)',
            ],
            [
                'id' => 27,
                'question' => 'Menyalahkan diri anda sendiri atas hal-hal yang sudah terjadi. (<em>Blaming yourself for things that have happened</em>)',
            ],
            [
                'id' => 28,
                'question' => 'Merasa bersalah karena masih hidup/selamat. (<em>Feeling guilty for having survived</em>)',
            ],
            [
                'id' => 29,
                'question' => 'Tidak punya harapan. (<em>Hopelessnes</em>)',
            ],
            [
                'id' => 30,
                'question' => 'Merasa malu atas hal-hal menyakitkan yang terjadi pada diri anda. (<em>Feeling ashamed of the painful things that have happened to you</em>)',
            ],
            [
                'id' => 31,
                'question' => 'Merasa bahwa orang lain tidak dapat memahami (mengerti) mengenai apa yang sudah terjadi pada diri anda. (<em>Feeling that people do not understand what happened to you</em>)',
            ],
            [
                'id' => 32,
                'question' => 'Merasa bahwa orang lain memusuhi anda. (<em>Feeling others are hostile to you</em>)',
            ],
            [
                'id' => 33,
                'question' => 'Merasa bahwa anda tidak memiliki orang yang dapat dipercaya atau diandalkan. (<em>Feeling that you have no one to rely on</em>)',
            ],
            [
                'id' => 34,
                'question' => 'Merasa bahwa seseorang yang anda percayai berkhianat pada anda. (<em>Feeling that someone you trusted betrayed you</em>)',
            ],
            [
                'id' => 35,
                'question' => 'Merasa terhina atas pengalaman yang menimpa diri anda. (<em>Feeling humiliated by your experience</em>)',
            ],
            [
                'id' => 36,
                'question' => 'Tidak percaya kepada orang lain. (<em>Feeling no trust in others</em>)',
            ],
            [
                'id' => 37,
                'question' => 'Merasa tidak berdaya untuk menolong orang lain. (<em>Feeling powerless to help others</em>)',
            ],
            [
                'id' => 38,
                'question' => 'Menghabiskan waktu untuk memikirkan mengapa semua kejadian ini menimpa diri anda. (<em>Spending time thinking about why these events happened to you</em>)',
            ],
            [
                'id' => 39,
                'question' => 'Merasa bahwa hanya anda sendiri yang menderita akibat kejadian-kejadian ini. (<em>Feeling that you are the only on that suffered these events</em>)',
            ],
            [
                'id' => 40,
                'question' => 'Merasa perlu membalas dendam. (<em>Feeling a need for revenge</em>)',
            ],
        ];

        DB::table('ref_qhtq')->insert($questions);
    }
}
