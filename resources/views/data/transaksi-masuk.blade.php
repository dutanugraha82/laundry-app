@extends('master')
@section('titletab','Data Proses')
@section('content')

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
<<<<<<< HEAD
            <td class="text-center">               
=======
            <td class="text-center">
>>>>>>> 9b4cac12c1584b4fdfc5e848932f83477d5ae75d
                <form action="/data/{{ $item->id }}" method="POST">
                  @csrf
                  @method('delete')
                    <a href="/list-data-laundry/proses/detail/{{ $item->id }}" class="btn btn-primary">Detail</a>
                    <a href="/data/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                    <input type="submit" class="btn btn-danger" value="Delete">
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
@endsection

{{-- @push('css')
<link rel="stylesheet" href="sweetalert2.min.css">
@endpush --}}

{{--  @push('script_sweetalert')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>

<script>
  Swal.fire({
  title: 'Error!',
  text: 'Do you want to continue',
  icon: 'error',
  confirmButtonText: 'Cool'
})
</script>
@endpush --}}