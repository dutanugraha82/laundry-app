<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataLaundryController extends Controller
{
    // View index or dashboard page
    public function index() {
        return view('dashboard/dashboard');
    }
    
    // Get data where status laundry proses
    // public function laundry_proses(){
    //     $dataProses = DB::table('data')
    //                     ->where('status','proses')
    //                     ->get();
    //     return view('laundry.laundry-proses', compact('dataProses'));
    // }

    // // Get data where status laundry selesai & status_pembayaran selesai
    // public function laundry_selesai(){
    //     $dataSelesai = DB::table('data')
    //                     ->where('status','selesai')
    //                     ->where('status_pembayaran','lunas')
    //                     ->get();
    //     return view('data.data-selesai', compact('dataSelesai'));
    // }

    // Get data where status pembayaran belum lunas
    public function transaksi_masuk() {
        $transaksiMasuk = DB::table('data')
                            -> where('status','proses')
                            ->get();
        return view('data.transaksi-masuk', compact('transaksiMasuk'));
    }

    // Get data where status pembayaran lunas
    public function transaksi_keluar() {
        $transaksiKeluar = DB::table('data')
                            -> where('status','selesai')
                            -> where('status_pembayaran','lunas')
                            ->get();
        return view('data.transaksi-keluar', compact('transaksiKeluar'));
    }

    // View form input data laundry
    public function insert(){
        return view('input-data');
    }

    // Store or insert data to Database
    public function store(Request $request){
        $request->validate([
        'nama' => 'required|max:255',
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
            'status' => 'Proses',
            'status_pembayaran' => 'Belum Lunas'
       ]);
       return redirect('/list-data-transaksi/masuk');
    }

    // View detail customer
    public function detail($id){
        $detail = DB::table('data')->where('id', $id)->first();
        return view('data.detail', compact('detail'));
    }

    // Update status pembayaran ketika customer bayar
    public function update_statusPembayaran(Request $request, $id) {
        dd($request);
        
        if($request->total === $request->bayar) {
            $update = DB::table('data')
                    ->where('id',$id)
                    ->update(['status_pembayaran' => 'lunas']);

        }
        // return redirect('/');
    }
}
