<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use Illuminate\Http\Request;

class TestFinishedController extends Controller
{
    public function testFinished(Hasil $hasil) {
        $hasil->load('ghqAnswers', 'dass21Answers');
        return view('test.finished', compact('hasil'));
    }
}
