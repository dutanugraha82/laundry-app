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
                                <label for="no_transaksi">Nomor Transaksi</label>
                                <input type="text" class="form-control" name="no_transaksi" id="no_transaksi" value="001" readonly>
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="nama">Nama Customer</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama') }}" autofocus>
                                @error('nama')
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="jenis">jenis Laundry</label>
                                <select name="jenis[]" id="jenis" class="form-control @error('jenis') is-invalid @enderror" required>
                                    <option value="">--Pilih jenis Laundry--</option>                                    
                                    @foreach ($dataNamaJenis as $data)
                                        <option value="{{$data->nama_jenis}}">{{ $data->nama_jenis }}</option>
                                    @endforeach
                                    @error('jenis')
                                        <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                                    @enderror
                                </select>
                            </div>            
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="qty">Qty <span style="color: red; font-size: 12px; font-weight: normal;" >(*Kg *Meter *Pasang *Pcs)</span></label>
                                <input type="text" name="qty[]" class="form-control @error('qty') is-invalid @enderror" id="qty" value="{{ old('qty') }}">
                                @error('qty')
                                    <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" id="hapusRow">
                        <div class="col" id="col1"></div>
                        <div class="col" id="col2"></div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">                                
                                <input type="text" class="form-control" name="status_pembayaran" value="" hidden>
                            </div>
                            <div class="my-3" id="button-group">
                                <button type="submit" class="btn btn-primary">Submit Data Laundry</button>
                                <button id="addRow" type="button" class="btn btn-success">Tambah barang</button>                                                                
                            </div>
                        </div>
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

@push('script')
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Add Form -->
<script type="text/javascript">
    // add row
    $("#addRow").click(function () {
        var html = '';
        html += '<div class="mb-3" id="inputFormRow">';
        html += '<label for="jenis">jenis Laundry</label>';
        html += '<select name="jenis[]" id="jenis" class="form-control @error("jenis") is-invalid @enderror" required>';
        html += '<option value="">--Pilih jenis Laundry--</option>';
        html += '@foreach ($dataNamaJenis as $data)';
        html += '<option value="{{$data->nama_jenis}}">{{ $data->nama_jenis }}</option>';
        html += '@endforeach';
        html += '@error("jenis")';
        html += '<span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>';
        html += '@enderror';
        html += '</select>';
        html += '</div>';        
        
        $('#col1').append(html);
    });

    $("#addRow").click(function () {
        var html = '';
        html += '<div class="mb-3" id="inputFormRow">';
        html += '<label for="qty">Qty <span style="color: red; font-size: 12px; font-weight: normal;" >(*Kg *Meter *Pasang *Pcs)</span></label>';
        html += '<input type="text" name="qty[]" class="form-control @error("qty") is-invalid @enderror" id="qty" value="{{ old("qty") }}">';        
        html += '@error("qty")';
        html += '<span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>';
        html += '@enderror';
        html += '<a id="btnRemoveRow" type="submit" style="color: red;">- Hapus Row</a>';
        html += '</div>';

        $('#col2').append(html);
    });    

    // remove row
    $(document).on('click', '#btnRemoveRow', function () {
        $(this).closest('#hapusRow').remove();
    });
</script>
@endpush