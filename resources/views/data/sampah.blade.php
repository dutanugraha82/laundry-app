@extends('master')
@section('titletab','Sampah')
@section('content')

<div class="container">
  <div class="card">
    <div class="card-header">
      <h3>Sampah</h3>
      <div class="row">
        <div class="col-lg-3">
          <button type="submit" class="btn btn-success btn-sm btn-block">Restore data</button>
        </div>
        <div class="col-lg-3">
          <button type="submit" class="btn btn-danger btn-sm btn-block">Delete data</button>
        </div>
      </div>
      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
        </div>        
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0" style="height: 300px;">
      <table class="table table-head-fixed text-nowrap">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Customer</th>
            <th>No Hp</th>
            <th>Kuantitas</th>
            <th>Jenis Laundry</th>
            <th>Status Laundry</th>
            <th>Status Pembayaran</th>            
          </tr>
        </thead>
        <tbody>          
          <tr>
            <td>1</td>
            <td>Muhamad Haidar Ijlal</td>
            <td>0851652818255</td>
            <td>20</td>
            <td>Cuci</td>
            <td>proses</td>
            <td>lunas</td>
          </tr>
        </tbody>
      </table>
    </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>
@endsection

@section('css')

@endsection

@push('script_swal')
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
@endpush