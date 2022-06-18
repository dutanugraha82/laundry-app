<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class SampahCT extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Data::onlyTrashed()->get();

        return view('data/sampah', compact('data'));
    }
  
    /**
     * soft delete data
     *
     * @return void
     */
    public function destroy($id)
    {
        $data = Data::onlyTrashed()->where('id',$id);
        $data->forceDelete();
        
        return redirect('/sampah')->with('delete_success','Data berhasil didelete!');
    }
  
    /**
     * restore specific data
     *
     * @return void
     */
    public function restore($id)
    {
        $data = Data::onlyTrashed()->where('id',$id);
        $data->restore();

        return redirect('/sampah')->with('restore_success','Data berhasil dikembalikan!');
    }  
  
    /**
     * restore all data
     *
     * @return response()
     */
    public function restoreAll()
    {   
        $validate = Data::onlyTrashed()->get();
        if($validate->all() == []){

            return redirect('/sampah')->with('error_destroyall','Data tidak ditemukan!');
        }
        else{

            Data::onlyTrashed()->restore();
        }

        return redirect('/sampah')->with('success_restoreall','Semua data berhasil dikembalikan!');
        
    }

    /**
     * delete all data
     *
     * @return response()
     */
    public function destroyAll()
    {
        $validate = Data::onlyTrashed()->get();
        if($validate->all() == []){

            return redirect('/sampah')->with('error_deleteall','Data tidak ditemukan!');
        }

        Data::onlyTrashed()->forceDelete();
  
        return redirect('/sampah')->with('success_deleteall','Semua data berhasil didelete!');
    }
}
