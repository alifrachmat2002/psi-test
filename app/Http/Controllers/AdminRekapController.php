<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use Illuminate\Http\Request;

class AdminRekapController extends Controller
{
    public function index()
    {
        return view('admin.rekap.index');
    }
}
