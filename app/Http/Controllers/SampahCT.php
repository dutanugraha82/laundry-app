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
        if ($request->has('trashed')) {
            $datas = Data::onlyTrashed()
                ->get();
        } else {
            $datas = Data::get();
        }

        return view('datas', compact('datas'));
    }
  
    /**
     * soft delete data
     *
     * @return void
     */
    public function destroy($id)
    {
        Data::find($id)->delete();
  
        return redirect()->back();
    }
  
    /**
     * restore specific data
     *
     * @return void
     */
    public function restore($id)
    {
        Data::withTrashed()->find($id)->restore();
  
        return redirect()->back();
    }  
  
    /**
     * restore all data
     *
     * @return response()
     */
    public function restoreAll()
    {
        Data::onlyTrashed()->restore();
  
        return redirect()->back();
    }
}
