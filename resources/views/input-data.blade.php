@extends('master')
@section('titletab','Data Laundry')
@section('content')
<div class="content">
    <div class="card shadow-lg">
        <div class="card-header text-center">
            <h3>Input Data Laundry</h3>
        </div>
        <div class="card-body">
            <form action="/input-data-laundry" method="POST">
                @csrf
                <div class="container my-3">
                    <div class="row">
                        <div class="col">
                        <div class="mb-3">                                
                            <input type="text" name="jenis_id" class="form-control" value="{{ $dataNamaJenis }}">                                
                            </div>
                            <div class="mb-3">
                                <label for="nama">Nama Customer</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama') }}" autofocus>
                                @error('nama')
                                    <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nohp">No Hp</label>
                                <input type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp" id="nohp" value="{{ old('nohp') }}">
                                @error('nohp')
                                    <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="qty">Qty <span style="color: red; font-size: 12px; font-weight: normal;" >(*Kg *Meter *Pasang *Pcs)</span></label>
                                <input type="text" name="qty" class="form-control @error('qty') is-invalid @enderror" id="qty" value="{{ old('qty') }}">
                                @error('qty')
                                    <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">                                                       
                            <div class="mb-3">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" value="{{ old('tanggal') }}">
                                @error('tanggal')
                                    <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jenis">jenis Laundry</label>
                                <select name="jenis" id="jenis" class="form-control @error('jenis') is-invalid @enderror">
                                    <option value="">Pilih jenis Laundry</option>                                    
                                    @foreach ($dataNamaJenis as $data)
                                        <option value="{{$data->nama_jenis}}">{{ $data->nama_jenis }}</option>
                                    @endforeach
                                    @error('jenis')
                                        <option id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</option>
                                    @enderror
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="harga">Total Harga</label>
                                <input type="text" name="total" class="form-control @error('total') is-invalid @enderror" value="{{ old('total') }}">
                                @error('total')
                                    <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <!-- <label for="status">Status</label> -->
                                <input type="text" name="status" class="form-control" name="status" value="proses" hidden>
                            </div>
                        </div>                    
                    </div>
                    <div class="mb-3">
                        <!-- <label for="status-pembayaran">Status Pembayaran</label> -->
                        <input type="text" class="form-control" name="status_pembayaran" value="Belum Lunas" hidden>
                    </div>
                    <div class="my-3">
                        <button type="submit" class="btn btn-primary">Submit Data Laundry</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container text-center">
    <a href="/" class="btn btn-outline-warning btn-back shadow"><b>Kembali</b></a>
  </div>
@endsection