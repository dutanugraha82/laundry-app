@extends('master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Input Data Laundry</h3>
        </div>
        <div class="card-body">
        <form action="/" method="POST">
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
                        <input type="text" name="berat" class="form-control @error('berat') is-invalid @enderror" id="berat">
                        @error('berat')
                            <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                        @enderror
                     </div>
                     <div class="mb-3">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal">
                        @error('tanggal')
                            <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                        @enderror
                     </div>
                     <div class="mb-3">
                        <label for="harga">Total Harga</label>
                        <input type="text" name="total" class="form-control @error('total') is-invalid @enderror">
                        @error('total')
                            <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                        @enderror
                     </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="nohp">No Hp</label>
                        <input type="text" class="form-control" name="nohp" id="nohp">
                    </div>
                    <div class="mb-3">
                        <label for="jenis">Jenis</label>
                            <select name="jenis" id="jenis" class="form-control" required>
                                <option value="">Pilih Jenis Laundry</option>
                                <option value="reguler">Reguler</option>
                                <option value="express">Express</option>
                            </select>
                    </div>
                    <div class="mb-3">
                        <label for="jasa">Jasa Laundry</label>
                            <select name="jasa" id="jasa" class="form-control" required>
                                <option value="">Pilih Jasa Laundry</option>
                                <option value="Setrika">Setrika</option>
                                <option value="Cuci">Cuci</option>
                                <option value="Cuci dan Setrika">Cuci dan Setrika</option>
                            </select>
                    </div>
                </div>
            </div>
            <div class="my-3">
                <button type="submit" class="btn btn-primary">Submit Data Laundry</button>
            </div>
            </div>
        </form>
        </div>

        </div>
@endsection