@extends('master')
@section('titletab','Data Proses')
@section('content')

<div class="container">
  <div class="card">
    <div class="card-header">
      <h3>Laporan Data Pending</h3>
      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
        </div>
      </div>
    </div>
    @if (session('input_success'))
      <div class="alert alert-success">
        {{ session('input_success') }}
      </div>
    @endif
    @if (session('transaksi_success'))
      <div class="alert alert-success">
        {{ session('transaksi_success') }}
      </div>
    @endif
    @if (session('error'))
      <div class="alert alert-danger">
        {{ session('error') }}
      </div>
    @endif
    @if (session('edit_success'))
      <div class="alert alert-success">
        {{ session('edit_success') }}
      </div>
    @endif
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0" style="height: 300px;">
      <table class="table table-head-fixed text-nowrap">
        <thead>
          <tr>
            <th>Nama Customer</th>
            <th>No Hp</th>
            <th>Kuantitas</th>
            <th>Jenis Laundry</th>
            <th>Status Laundry</th>
            <th>Status Pembayaran</th>
            <th class="text-center">Aksi</th>
            <th>Cetak Struk</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($transaksiMasuk as $item)
          <tr>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->nohp }}</td>
            <td>{{ $item->berat }}</td>
            <td>{{ $item->jenis }}</td>
            <td class=" @if ($item->status == 'proses') text-danger @endif">{{ $item->status }}</td>
            <td class=" @if ($item->status_pembayaran == 'belum lunas') text-danger @else text-success @endif">{{ $item->status_pembayaran }}</td>
            <td class="text-center">
              <form action="/data/{{ $item->id }}" method="POST">
                @csrf
                @method('delete')
                <a href="/list-data-laundry/proses/detail/{{ $item->id }}" class="btn btn-sm btn-primary">Detail</a>
                <a href="/data/{{ $item->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                {{-- <input type="submit" class="btn btn-danger" value="Delete"> --}}
                <a onclick="confirmDelete({{ $item->id }})" class="btn btn-sm btn-danger">Hapus</a>
              </form>
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
</div>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
@endsection

@push('script_sweetalert')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function confirmDelete(data_id) {
               swal({
                   title: "Delete customer?",
                   text: "Data akan dihapus secara permanen!",
                   icon: "warning",
                   buttons: true,
                   dangerMode: true,
               })
                   .then((willDelete) => {
                       if (willDelete) {
                           window.location.href = ("/data/"+data_id);
                       } else {
                           swal("Hapus Dibatalkan");
                       }
                   });
           }
   </script>
@endpush