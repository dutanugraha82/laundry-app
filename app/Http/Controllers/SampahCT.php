<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampahCT extends Controller
{
    public function index() {
        return view('data/sampah');
    }
}
