@extends('master')
@section('titletab','Data Laundry')
@section('content')
<div class="content">
    <div class="card">
        <div class="card-header">
            <h3>Input Data Laundry</h3>
        </div>
        <div class="card-body">
            <form action="/input-data-laundry" method="POST">
                @csrf
                <div class="container my-3">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="nama">Nama Customer</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama') }}" autofocus>
                                @error('nama')
                                    <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="berat">Berat</label>
                                <input type="text" name="berat" class="form-control @error('berat') is-invalid @enderror" id="berat" value="{{ old('berat') }}">
                                @error('berat')
                                    <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" value="{{ old('tanggal') }}">
                                @error('tanggal')
                                    <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="harga">Total Harga</label>
                                <input type="text" name="total" class="form-control @error('total') is-invalid @enderror" value="{{ old('total') }}">
                                @error('total')
                                    <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="nohp">No Hp</label>
                                <input type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp" id="nohp" value="{{ old('nohp') }}">
                                @error('nohp')
                                    <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jenis">Jenis</label>
                                <select name="jenis" id="jenis" class="form-control" required value="{{ old('jenis') }}">
                                    <option value="">Pilih Jenis Laundry</option>
                                    <option value="reguler" @if (old('jenis') == 'reguler') selected @endif>Reguler</option>
                                    <option value="express" @if (old('jenis') == 'express') selected @endif>Express</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jasa">Jasa Laundry</label>
                                <select name="jasa" id="jasa" class="form-control">
                                    <option value="">Pilih Jasa Laundry</option>
                                    <option value="setrika"  @if (old('jasa') == 'setrika') selected @endif>Setrika</option>
                                    <option value="cuci" @if (old('jasa') == 'cuci') selected @endif>Cuci</option>
                                    <option value="cuci dan setrika" @if (old('jasa') == 'cuci dan setrika') selected @endif>Cuci dan Setrika</option>
                                </select>
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
@endsection