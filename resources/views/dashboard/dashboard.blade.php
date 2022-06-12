@extends('master')
@section('content')
  <div class="card">
    <div class="card-header">
        <h3>Dashboard</h3>
    </div>

    <!-- Section Widget Data Masuk start -->
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>150</h3>
              <p>Data Masuk</p>
              </div>
              <div class="icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-6 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>150</h3>
              <p>Data Keluar</p>
              </div>
              <div class="icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- Section Widget Data Masuk End -->
  </div>
@endsection