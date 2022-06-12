<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataLaundryController extends Controller
{
    public function index(){
        $dataMasuk = DB::table('data')->get();
        return view('data.data-pending', compact('dataMasuk'));
    }

    public function insert(){
        return view('input-data');
    }



    public function store(Request $request){
       $request->validate([
        'nama' => 'required',
        'berat' => 'required',
        'jenis' => 'required',
        'tanggal' => 'required',
        'jasa' => 'required',
        'total' => 'required',
       ]);

       DB::table('data')->insert([
            'nama' => $request->nama,
            'nohp' => $request->nohp,
            'berat' => $request->berat,
            'jenis' => $request->jenis,
            'tanggal' => $request->tanggal,
            'jasa' => $request->jasa,
            'total' => $request->total,
       ]);
       return redirect('/');
    }

    public function detail($id){
        $detail = DB::table('data')->where('id', $id)->first();
        return view('data.detail', compact('detail'));
    }

}
