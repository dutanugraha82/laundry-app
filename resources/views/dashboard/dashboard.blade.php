@extends('master')
@section('titletab','Dashboard')
@section('content')
<div class="content">
  <div class="card">
    <div class="card-header text-center">
        <h3>Laundry Name</h3>
    </div>
    <!-- Section Widget Data Masuk start -->
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $transaksiMasuk }}</h3>
              <p>Transaksi Belum Lunas</p>
              </div>
              <div class="icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="/list-data-laundry/data-pending" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-6 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $transaksiKeluar }}</h3>
              <p>Transaksi Selesai</p>
              </div>
              <div class="icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="/data-selesai" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- Section Widget Data Masuk End -->
  </div>
</div>
  <div class="content my-4">
    <h2 class="text-center text-white">Menu</h2>
  </div>
  <div class="content">
    <div class="row">
      <div class="col">
        <div class="mb-3">
          <a href="/input-data-laundry" class="hover">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-arrow-down-square-fill" viewBox="0 0 16 16">
              <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5a.5.5 0 0 1 1 0z"/>
            </svg>
            <p class="text-white">Transaksi Masuk</p>
          </a>
        </div>
      </div>

      <div class="col">

      </div>

      <div class="col">

      </div>

    </div>
  </div>
@endsection