@extends('master')
@section('titletab','Data Selesai')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      <h3>Laporan Data Selesai</h3>
      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;"></div>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0" style="height: 300px;">
      <table class="table table-head-fixed text-nowrap">
        <thead>
          <tr>
            <th>Nama Customer</th>
            <th>No Hp</th>
            <th>Kuantitas</th>
            <th>Jenis Laundry</th>
            <th>Status</th>
            <th>Status Pembayaran</th>
            <th class="text-center">Aksi</th>
            <th>Cetak Struk</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($transaksiKeluar as $item)
          <tr>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->nohp }}</td>
            <td>{{ $item->berat }}</td>
            <td>{{ $item->jenis }}</td>
            <td class=" @if ($item->status == 'selesai') text-success @else text-success @endif">{{ $item->status }}</td>
            <td class=" @if ($item->status_pembayaran == 'lunas') text-success @else text-success @endif">{{ $item->status_pembayaran }}</td>            
            <td class="text-center">
                <!-- <form action="#"> -->
                <a href="/list-data-laundry/proses/detail/{{ $item->id }}" class="btn btn-primary">Detail</a>
                <a href="#" class="btn btn-warning">Edit</a>
                   
                    <input type="submit" class="btn btn-danger" value="Delete">
                <!-- </form> -->
            </td>
            <td>
                <a href="#" class="btn btn-primary">Cetak Struk</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</div>
@endsection