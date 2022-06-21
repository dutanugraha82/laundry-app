@extends('master')
@section('titletab','Laporan Harian')
@section('content')
<div class="card">
    <div class="card-header">
    <h3 class="text-center">Laporan Harian</h3>
    </div>
    
    <div class="card-body table-responsive p-0">
     <table class="table table-hover text-nowrap">
    <thead>
    <tr>
    <th>Tanggal</th>
    <th>Nama</th>
    <th>Berat</th>
    <th>Total Harga</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <td>29-03-1022</td>
    <td>John Doe</td>
    <td>2kg</td>
    <td>Rp 10000</td>
    </tr>
    </tbody>
    </table>
    </div>
    <hr>
    <div class="card-footer">
      <div class="row">
        <div class="col">
            <div class="mb-3">
                <h4>Total Berat : </h4>
            </div>
            
        </div>
        <div class="col">
            <div class="mb-3">
                <h4>Total Uang Masuk : </h4>
            </div>
        </div>
      </div>
    </div>
    </div>
    <div class="container-fluid text-center">
        <a href="/" class="btn btn-outline-warning btn-back shadow"><b>Kembali</b></a>
      </div>
@endsection