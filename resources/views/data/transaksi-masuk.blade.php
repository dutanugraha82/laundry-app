@extends('master')
@section('titletab','Data Proses')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="class-title">Data transaksi masuk</h3>
        </div>
        <div class="card-body">
          <div class="box">
            <!-- <div class="box-header with-border">
              <a href="#" class="btn btn-primary btn-md">Tambah data</a>
            </div>
            <br> -->
            <div class="box-body table-responsive">
              <table class="table table-striped table-bordered">
                <thead>
                  <th>No</th>
                  <th>Nama</th>
                  <th>No Hp</th>
                  <th>Berat</th>
                  <th>Jenis Laundry</th>
                  <th>Tanggal</th>
                  <th>Jasa Laundry</th>
                  <th>Status laundry</th>
                  <th>Status Pembayaran</th>
                  <th>Aksi</th>
                </thead>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @if(Session::has('sukses_input'))
  <script>
      swal("Sukses!", "{{Session::get('sukses_input')}}", "success", {
        button: "Ok",
      });
    </script>
  @elseif(Session::has('transaction_failed'))
  <script>
      swal("Gagal!", "{{Session::get('transaction_failed')}}", "error", {
        button: "Ok",
      });
    </script>
  @elseif(Session::has('transaction_success'))
  <script>
      swal("Sukses!", "{{Session::get('transaction_success')}}", "success", {
        button: "Ok",
      });
    </script>
  @elseif(Session::has('update_success'))
  <script>
      swal("Sukses!", "{{Session::get('update_success')}}", "success", {
        button: "Ok",
      });
    </script>
  @elseif(Session::has('delete_success'))
  <script>
      swal("Sukses!", "{{Session::get('delete_success')}}", "success", {
        button: "Ok",
      });
    </script>
  @endif

  <!-- dataTable Section -->
  <script>
    let table;

    $(function () {
      table = $('.table').DataTable({
        processing: true,
        autoWidth: false, 
        ajax: {
          url: '/list-data-transaksi/masuk/jsonDataMasuk',
        },
        columns: [
          {data: 'DT_RowIndex', searchable: false, sortable: false},
          {data: 'nama'},
          {data: 'nohp'},
          {data: 'berat'},
          {data: 'jenis'},
          {data: 'tanggal'},
          {data: 'jasa'},
          {data: 'status'},
          {data: 'status_pembayaran'},
          {data: 'aksi', searchable: false, sortable: false}
        ]
      });
    });
  </script>
@endpush