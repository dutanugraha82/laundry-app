@extends('master')
@section('titletab','Detail')
@section('content')  
    <div class="card">
        <div class="card-header">
            <h3>Detail Data Laundry</h3>
        </div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card-body">
        <form action="/list-data-laundry/proses/detail/{{ $detail->id }}" method="POST">web
        @csrf
        @method('put')
        <div class="container my-3">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="nama">Nama Customer</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="{{ $detail->nama }}" required disabled>
                     </div>
                     <div class="mb-3">
                        <label for="berat">Berat</label>
                        <input type="text" name="berat" class="form-control" id="berat" value="{{ $detail->berat }}Kg" disabled>
                     </div>
                     <div class="mb-3">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{ $detail->tanggal }}" disabled>
                     </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="nohp">No Hp</label>
                        <input type="text" class="form-control" name="nohp" id="nohp" value="{{ $detail->nohp }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="jenis">Jenis</label>
                            <input type="text" class="form-control" name="jenis" id="jenis" value="{{ $detail->jenis }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="jasa">Jasa Laundry</label>
                            <input type="text" class="form-control" name="jasa" id="jasa" value="{{ $detail->jasa }}" disabled>
                    </div>
                </div>
            </div>
            <div class="mb-3 mx-auto">
                <label for="harga">Total Harga</label>
                <input type="text" name="total" class="form-control" value="Rp {{ $detail->total }}" disabled>
                <input type="text" name="total" class="form-control" value="{{ $detail->total }}" hidden>
            </div>
            @if($detail->status_pembayaran == 'belum lunas')
                
                    <label for="bayar">Bayar</label>
                    <input type="text" name="bayar" class="form-control">
                </div>
            @else
                <div class="mb-3 mx-auto">
                    <h1 class="text-success text-center">LUNAS</h1>
                </div>
            @endif
            <div class="my-3 text-center">
                @if($detail->status_pembayaran == 'belum lunas')
                    <button type="submit" class="btn btn-success mx-2" style="width: 8rem"><b>Bayar</b></button>
                @endif
                <!-- <a href="#" class="btn btn-warning mx-3" style="width: 8rem"><b>Simpan</b></a> -->
            </div>
            </div>
        </form>
        </div>

        </div>
@endsection