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
                'question' => 'Pikiran atau ingatan yang berulang kali muncul mengenai kejadian yang paling menyakitkan atau mengerikan. Recurrent thoughts or memories of the most hurtful or terrifying events'
            ],
            [
                'id' => 2,
                'question' => 'Merasa seakan-akan peristiwa itu terjadi lagi. Feeling as though the event is happening again'
            ],
            [
                'id' => 3,
                'question' => 'Mimpi buruk berulang kali. Recurrent nightmares'
            ],
            [
                'id' => 4,
                'question' => 'Merasa ada jarak, tidak dapat akrab atau menarik (memisahkan) diri dari orang banyak. Feeling detached or withdrawn from people'
            ],
            [
                'id' => 5,
                'question' => 'Tidak dapat merasakan suatu perasaan (emosi) apa pun. Unable to feel emotions'
            ],
            [
                'id' => 6,
                'question' => 'Merasa tegang, gugup, mudah terkejut. Feeling jumpy, easily startled'
            ],
            [
                'id' => 7,
                'question' => 'Kesulitan berkonsentrasi (memusatkan perhatian). Difficulty concentrating'
            ],
            [
                'id' => 8,
                'question' => 'Sulit tidur. Trouble sleeping'
            ],
            [
                'id' => 9,
                'question' => 'Merasa selalu waspada, berjaga-jaga (seakan-akan mengantisipasi ada hal buruk yang akan terjadi). Feeling on guard'
            ],
            [
                'id' => 10,
                'question' => 'Mudah tersinggung atau meledak marah. Feeling irritable or having outbursts of anger'
            ],
            [
                'id' => 11,
                'question' => 'Menghindari kegiatan yang mengingatkan kepada peristiwa yang paling menyakitkan atau traumatis. Avoiding activities that remind you of the most hurtful or traumatic events'
            ],
            [
                'id' => 12,
                'question' => 'Tidak mampu mengingat sebagian dari pengalaman yang paling menyakitkan atau traumatis. Inability to remember parts of the most hurtful or traumatic events'
            ],
            [
                'id' => 13,
                'question' => 'Kurang berminat atau kurang tertarik untuk melakukan kegiatan sehari-hari. Less interest in daily activities'
            ],
            [
                'id' => 14,
                'question' => 'Merasa seakan-akan anda tidak memiliki masa depan. Feeling as if you don\'t have a future'
            ],
            [
                'id' => 15,
                'question' => 'Menghindari pikiran atau perasaan yang berhubungan dengan peristiwa traumatik/menyakitkan. Avoiding thoughts or feelings associated with the traumatic or hurtful event'
            ],
            [
                'id' => 16,
                'question' => 'Reaksi emosional atau fisik yang tiba-tiba ketika teringat pada peristiwa yang paling menyakitkan atau traumatis. Sudden emotional or physical reaction when reminded of the most hurtful or traumatic events'
            ],
            [
                'id' => 17,
                'question' => 'Merasa bahwa anda tidak lagi mampu melakukan hal-hal yang biasa anda lakukan dahulu. Feeling that you cannot do some things that you used to do before'
            ],
            [
                'id' => 18,
                'question' => 'Mengalami kesulitan menghadapi atau menyesuaikan diri terhadap situasi baru. Having difficulty dealing with new situations'
            ],
            [
                'id' => 19,
                'question' => 'Merasa amat lelah. Feeling plenty tired'
            ],
            [
                'id' => 20,
                'question' => 'Merasa nyeri atau sakit pada tubuh. Bodily pain'
            ],
            [
                'id' => 21,
                'question' => 'Terganggu oleh berbagai macam keluhan atau masalah fisik. Troubled by physical problems'
            ],
            [
                'id' => 22,
                'question' => 'Sulit mengingat. Poor memory'
            ],
            [
                'id' => 23,
                'question' => 'Pernah tahu sendiri/diberi tahu orang lain bahwa anda melakukan sesuatu hal yang tidak anda ingat. Finding out or being told by other people that you have done something you cannot remember'
            ],
            [
                'id' => 24,
                'question' => 'Kesulitan memusatkan perhatian. Difficulty paying attention'
            ],
            [
                'id' => 25,
                'question' => 'Merasa seakan-akan anda terpecah menjadi dua orang dan salah satunya memperhatikan apa yang sedang dilakukan oleh yang lainnya. Feeling as if you are split into two people and one of you is watching what the other is doing'
            ],
            [
                'id' => 26,
                'question' => 'Merasa tidak mampu membuat rencana harian. Feeling unable to make daily plans'
            ],
            [
                'id' => 27,
                'question' => 'Menyalahkan diri anda sendiri atas hal-hal yang sudah terjadi. Blaming yourself for things that have happened'
            ],
            [
                'id' => 28,
                'question' => 'Merasa bersalah karena masih hidup/selamat. Feeling guilty for having survived'
            ],
            [
                'id' => 29,
                'question' => 'Tidak punya harapan. Hopelessnes'
            ],
            [
                'id' => 30,
                'question' => 'Merasa malu atas hal-hal menyakitkan yang terjadi pada diri anda. Feeling ashamed of the painful things that have happened to you'
            ],
            [
                'id' => 31,
                'question' => 'Merasa bahwa orang lain tidak dapat memahami (mengerti) mengenai apa yang sudah terjadi pada diri anda. Feeling that people do not understand what happened to you'
            ],
            [
                'id' => 32,
                'question' => 'Merasa bahwa orang lain memusuhi anda. Feeling others are hostile to you'
            ],
            [
                'id' => 33,
                'question' => 'Merasa bahwa anda tidak memiliki orang yang dapat dipercaya atau diandalkan. Feeling that you have no one to rely on'
            ],
            [
                'id' => 34,
                'question' => 'Merasa bahwa seseorang yang anda percayai berkhianat pada anda. Feeling that someone you trusted betrayed you'
            ],
            [
                'id' => 35,
                'question' => 'Merasa terhina atas pengalaman yang menimpa diri anda. Feeling humiliated by your experience'
            ],
            [
                'id' => 36,
                'question' => 'Tidak percaya kepada orang lain. Feeling no trust in others'
            ],
            [
                'id' => 37,
                'question' => 'Merasa tidak berdaya untuk menolong orang lain. Feeling powerless to help others'
            ],
            [
                'id' => 38,
                'question' => 'Menghabiskan waktu untuk memikirkan mengapa semua kejadian ini menimpa diri anda. Spending time thinking about why these events happened to you'
            ],
            [
                'id' => 39,
                'question' => 'Merasa bahwa hanya anda sendiri yang menderita akibat kejadian-kejadian ini. Feeling that you are the only on that suffered these events'
            ],
            [
                'id' => 40,
                'question' => 'Merasa perlu membalas dendam. Feeling a need for revenge'
            ],
        ];

        DB::table('ref_qhtq')->insert($questions);
    }
}
