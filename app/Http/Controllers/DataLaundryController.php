<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// use Illuminate\Support\Facades\Session;
use Whoops\Run;

class DataLaundryController extends Controller
{
    // View index or dashboard page
    public function index() {

        $transaksiMasuk = Data::where('status','proses')
                          ->where('status_pembayaran','belum lunas')
                          ->count();

        $transaksiKeluar = Data::where('status','selesai')
                           ->where('status_pembayaran','lunas')
                           ->count();
        
        return view('dashboard/dashboard', ['transaksiMasuk' => $transaksiMasuk, 'transaksiKeluar' => $transaksiKeluar]);
    }

    public function transaksi_masuk() {       
        
        return view('data.transaksi-masuk');
    }

    public function jsonDataMasuk(){

        $data = Data::orderBy('id','desc')
                    ->where('status','proses')        
                    ->where('status_pembayaran','lunas')
                    ->orwhere('status_pembayaran','belum lunas')
                    ->get();

        return datatables()
                ->of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function($data) {
                    return '
                    <div class="btn btn-group">
                        <a href="/list-data-laundry/proses/detail/'.$data->id.'" class="btn btn-success btn-sm">Detail</a>
                        <a href="/data/'.$data->id.'/edit" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/data/'.$data->id.'"class="btn btn-danger btn-sm">Delete</a>
                        <a href="/data/invoice/'.$data->id.'" class="btn btn-primary btn-sm">Invoice</a>
                        <a href="/list-data-laundry/proses/detail/'.$data->id.'/selesai" class="btn btn-outline-success btn-sm">Selesai</a>
                    </div>
                    ';
                })
                ->rawColumns(['aksi'])
                ->make(true);
            
    }

    public function jsonDataKeluar(){

        $data = Data::orderBy('id','desc')
                ->where('status','selesai')        
                ->where('status_pembayaran','lunas')        
                ->get();

        return datatables()
                ->of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function($data) {
                    return '
                    <div class="btn btn-group">
                        <a href="/list-data-laundry/proses/detail/'.$data->id.'" class="btn btn-success btn-sm">Detail</a>                      
                        <a href="/data/'.$data->id.'"class="btn btn-danger btn-sm">Delete</a>
                        <a href="/data/invoice/'.$data->id.'" class="btn btn-primary btn-sm">Invoice</a>
                    </div>
                    ';
                })
                ->rawColumns(['aksi'])
                ->make(true);
            
    }

    // Get data where status pembayaran lunas
    public function transaksi_keluar() {
        $transaksiKeluar = DB::table('data')
                            ->where('status','selesai')
                            ->where('status_pembayaran','lunas')
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
            'nohp' => 'numeric|digits_between:12,15',
            'berat' => 'required|numeric|digits_between:1,2',
            'jenis' => 'required',
            'tanggal' => 'required',
            'jasa' => 'required',
            'total' => 'required|numeric',
       ]);

       DB::table('data')->insert([
            'nama' => $request->nama,
            'nohp' => $request->nohp,
            'berat' => $request->berat,
            'jenis' => $request->jenis,
            'tanggal' => $request->tanggal,
            'jasa' => $request->jasa,
            'total' => $request->total,
            'status' => 'proses',
            'status_pembayaran' => 'belum lunas'
       ]);
       
       return redirect('/list-data-transaksi/masuk')->with('sukses_input', 'Data berhasil ditambahkan!');
    }

    // View detail customer
    public function detail($id){
        $detail = DB::table('data')->where('id', $id)->first();
        return view('data.detail', compact('detail'));
    }

    // Update status pembayaran ketika customer bayar
    public function update_statusPembayaran(Request $request, $id) {

        $request->validate([
            'bayar' => 'required|Integer',
           ]);

        if (intval($request->total) <= intval($request->bayar)) {
            
        $update = DB::table('data')
                    ->where('id',$id)
                    ->update([
                        "status_pembayaran" => "lunas"
                    ]);
        }
        else  {
            return redirect('/list-data-transaksi/masuk')->with('transaction_failed', 'Transaksi  gagal! (Pembayaran kurang)');
        }

        return redirect('/list-data-transaksi/masuk')->with('transaction_success', 'Transaksi  berhasil!');
    }

    public function updateProses($id){        

        $data = DB::table('data')
                    ->where('id',$id)
                    ->where('status_pembayaran','lunas')
                    ->first();

        if($data){
            DB::table('data')
                ->where('id', $id)
                ->update([
                    "status" => "selesai"
                ]);

                return redirect('/dashboard')->with('update_success', 'Proses selesai!');        
        }
        else {
            return redirect('dashboard')->with('error_updateStatus','Status pembayaran belum selesai!');
        }

    }

    public function edit($id){

        $edit = DB::table('data')->where('id', $id)->first();

        return view('data.edit', compact('edit'));
    }

    public function update($id,  Request $request){        

        $request->validate([
            'nama' => 'required|max:255',
            'nohp' => 'numeric|max:15',
            'berat' => 'required|numeric|max:2',
            'jenis' => 'required',
            'tanggal' => 'required',
            'jasa' => 'required',
            'total' => 'required|numeric',
           ]);

           DB::table('data')->where('id', $id)->update([
            'nama' => $request['nama'],
            'nohp' => $request['nohp'],
            'berat' => $request['berat'],
            'jenis' => $request['jenis'],
            'tanggal' => $request['tanggal'],
            'jasa' => $request['jasa'],
            'total' => $request['total']
           ]);

           return redirect('/list-data-transaksi/masuk')->with('update_success','Data berhasil dirubah!');           

    }    

    // Delete Data
    public function delete($id){
        $data = Data::find($id);
        $data->delete();


        return redirect('/list-data-transaksi/masuk')->with('delete_success','data berhasil didelete sementara!');
    }

    public function invoice($id) {
        $data = Data::where('id',$id)->first();

        return view('data/invoice', compact('data'));
    }

    public function laporanHarian(){
        $laporan = DB::table('data')
                ->select('*')
                ->where('status','selesai')
                ->where('status_pembayaran','lunas')
                ->whereDate('tanggal',Carbon::today())
                ->get();
                dd($laporan);
    }

}
