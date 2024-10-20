<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testFinished(Hasil $hasil) {
        $hasil->load('ghqAnswers', 'dass21Answers');
        return view('test.finished', compact('hasil'));
    }

    public function resumeTest() {
        $user = auth()->user();
        $latestHasil = $user->latestHasil;
        if ($latestHasil->last_test === 'ghq12') {
            return redirect()->route('test-dass21');
        }
        if ($latestHasil->last_test === 'dass-21') {
            return redirect()->route('test-hscl25');
        }
        if ($latestHasil->last_test === 'hscl-25') {
            return redirect()->route('test-htq');
        }
        return redirect()->route('dashboard');
    }
}
