<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use Illuminate\Http\Request;

class TestFinishedController extends Controller
{
    public function testFinished(Hasil $hasil) {
        return view('test.finished', compact('hasil'));
    }
}
