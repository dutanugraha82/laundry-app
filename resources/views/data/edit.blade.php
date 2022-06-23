@extends('master')
@section('titletab','Data Laundry')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Edit Data Laundry</h3>
        </div>
        <div class="card-body">
        <form action="/data/{{ $edit->id }}" method="POST">
        @csrf
        @method('put')
        <div class="container my-3">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="nama">Nama Customer</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ $edit->nama }}">
                        @error('nama')
                            <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                        @enderror
                     </div>
                     <div class="mb-3">
                        <label for="qty">QTY</label>
                        <input type="text" name="qty" class="form-control @error('berat') is-invalid @enderror" id="qty" value="{{ $edit->berat }}">
                        @error('qty')
                            <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                        @enderror
                     </div>
                     <div class="mb-3">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" value="{{ $edit->tanggal }}">
                        @error('tanggal')
                            <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                        @enderror
                     </div>
                     <div class="mb-3">
                        <label for="harga">Total Harga</label>
                        <input type="text" name="total" class="form-control @error('total') is-invalid @enderror" value="{{ $edit->total }}">
                        @error('total')
                            <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="nohp">No Hp</label>
                        <input type="text" class="form-control" name="nohp" id="nohp" value="{{ $edit->nohp }}">
                    </div>
                    <div class="mb-3">
                        <label for="jenis">Jenis</label>
                        <select name="jenis" id="jenis" class="form-control" required>
                            <option @if($edit->jenis == 'reguler') selected @endif value="reguler">Reguler</option>
                            <option @if($edit->jenis == 'express') selected @endif value="express">Express</option>
                        </select>
                    </div>
                </div>                    
            </div>
            <div class="my-3">
                <button type="submit" class="btn btn-primary">Update Data Laundry</button>
            </div>
            </div>
        </form>
        </div>

        </div>

        <div class="container text-center">
            <a href="/" class="btn btn-outline-warning btn-back shadow"><b>Kembali</b></a>
          </div>
@endsection