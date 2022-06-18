@extends('master')
@section('titletab','Sampah')
@section('content')

<div class="container">
  <div class="card">
    <div class="card-header">
      <h3>Sampah</h3>
      <div class="row">
        <div class="col-lg-3">
          <a href="/sampah/restoreall" type="submit" class="btn btn-success btn-sm btn-block">Restore all data</a>
        </div>
        <div class="col-lg-3">
          <a href="/sampah/destroyall" type="submit" class="btn btn-danger btn-sm btn-block">Delete all data</a>
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
            <th>No</th>
            <th>Nama Customer</th>
            <th>No Hp</th>
            <th>Kuantitas</th>
            <th>Jenis Laundry</th>
            <th>Status Laundry</th>
            <th>Status Pembayaran</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>    
          @foreach($data as $index => $item)      
          <tr>
            <td>{{ $index+1 }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->nohp }}</td>
            <td>{{ $item->berat }}</td>
            <td>{{ $item->jenis }}</td>
            <td>{{ $item->status }}</td>
            <td>{{ $item->status_pembayaran }}</td>
            <td>
              <a href="/sampah/restore/{{ $item->id }}"class="btn btn-success btn-sm">Restore</a>
              <a href="/sampah/destroy/{{ $item->id }}"class="btn btn-danger btn-sm">Delete</a>
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

@push('script_swal')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @if(Session::has('error_destroyall'))
    <script>
        swal("Eror!", "{{Session::get('error_destroyall')}}", "error", {
          button: "Ok",
        });
      </script>
  @endif
  @if(Session::has('error_deleteall'))
    <script>
        swal("Eror!", "{{Session::get('error_deleteall')}}", "error", {
          button: "Ok",
        });
      </script>
  @endif
  @if(Session::has('success_restoreall'))
    <script>
        swal("Sukses!", "{{Session::get('success_restoreall')}}", "success", {
          button: "Ok",
        });
      </script>
  @endif
  @if(Session::has('success_deleteall'))
    <script>
        swal("Sukses!", "{{Session::get('success_deleteall')}}", "success", {
          button: "Ok",
        });
      </script>
  @endif
  @if(Session::has('delete_success'))
    <script>
        swal("Sukses!", "{{Session::get('delete_success')}}", "success", {
          button: "Ok",
        });
      </script>
  @endif
  @if(Session::has('restore_success'))
    <script>
        swal("Sukses!", "{{Session::get('restore_success')}}", "success", {
          button: "Ok",
        });
      </script>
  @endif  
@endpush
