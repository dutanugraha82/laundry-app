<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name') }} - @yield('titletab')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- mycss -->
  @stack('css')


</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Hello Admin!</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">        

          {{-- Section Dahsboard Start --}}
          <li class="nav-item">
            <a href="/dashboard" class="nav-link  @if ( Request::segment(1) == 'dashboard' ) active @endif">
              <i class="nav-icon fas fa-th-large"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          {{-- Section Dashboard End --}}

          {{-- Section Input Data Start --}}
          <li class="nav-item">
            <a href="/input-data-laundry" class="nav-link  @if ( Request::segment(1) == 'input-data-laundry') active @endif">
              <i class="nav-icon fas fa-th-large"></i>
              <p>
                Input Data Laundry
              </p>
            </a>
          </li>
          {{-- Section Input Data End --}}

          {{--  Section Data transaksi Start --}}
          <li class="nav-item">
            <a href="#" class="nav-link @if (Request::segment(1) == 'list-data-transaksi') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Data Transaksi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/list-data-transaksi/masuk" class="nav-link @if (Request::segment(2) == 'masuk') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transaksi Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/list-data-transaksi/keluar" class="nav-link @if (Request::segment(2) == 'keluar') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transaksi Keluar</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- Section Data Transaksi End --}}

       {{-- <-SectionDataLaundryStart --}}
          {{-- <li class="nav-item">
            <a href="#" class="nav-link @if (Request::segment(1) == 'list-data-laundry') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Data Laundry
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/list-data-laundry/proses" class="nav-link @if (Request::segment(2) == 'proses') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Laundry Proses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/list-data-laundry/selesai" class="nav-link @if (Request::segment(2) == 'selesai') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Laundry Selesai</p>
                </a>
              </li>
            </ul>
          </li> --}}
          {{-- Section Data Laundry End --}}

          {{-- Section Laporan Start --}}
          <li class="nav-item">
            <a href="#" class="nav-link @if (Request::segment(1) == '#') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Laporan Data Laundry
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link @if (Request::segment(2) == 'laporan-barang-masuk') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Data Harian</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link @if (Request::segment(2) == 'laporan-barang-keluar') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Data Bulanan</p>
                </a>
              </li>
            </ul>
          </li>
          {{--  Section Laporan End --}}
          
          {{-- Section Dahsboard Start --}}
          <li class="nav-item">
            <a href="/sampah" class="nav-link  @if ( Request::segment(1) == 'sampah' ) active @endif">
              <i class="nav-icon fas fa-th-large"></i>
              <p>
                Sampah
              </p>
            </a>
          </li>
          {{-- Section Dashboard End --}}

          <li class="mx-auto mt-3">
            <a href="/logout" class="btn btn-warning text-dark text-center" style="width: 200px"><b>Logout</b></a>
        </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('title')</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- myscript -->
@stack('script_swal')

</body>
</html>
