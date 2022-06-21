@extends('master')
@section('titletab','Invoice')
@section('content')
<div class="invoice p-3 mb-3">
  <div class="row">
    <div class="col-12">
    <h4>
    <i class="fas fa-globe"></i> Laundry Berkah.
    <small class="float-right">{{ $data->tanggal }}</small>
    </h4>
  </div>
</div>

<div class="row invoice-info">
  <div class="col-sm-4 invoice-col">
    <address>
      <strong>{{ $data->nama }}</strong><br>    
      Phone: {{$data->nohp}}<br>
    </address>
  </div>

  <div class="col-sm-4 invoice-col">
    <b>Invoice #007612</b><br>
    <br>
    <b>Order ID:</b> {{$data->id}}<br>
    <b>Payment Due:</b> 2/22/2014<br>
    <b>Account:</b> 968-34567
  </div>
</div>


<div class="row">
  <div class="col-12 table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Berat</th>
          <th>Jenis Laundry</th>
          <th>Jasa Laundry</th>
          <th>Status Laundry</th>
          <th>Status Pembayaran</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>{{ $data->berat }}</td>          
          <td>{{ $data->jenis }}</td>          
          <td>{{ $data->jasa }}</td>          
          <td>{{ $data->status }}</td>          
          <td>{{ $data->status_pembayaran }}</td>          
          <td>Rp. {{ number_format($data->total) }}</td>          
        </tr>
      </tbody>
    </table>`
  </div>
</div>

<!-- <div class="row">
  <div class="col-6">
    <p class="lead">Payment Methods:</p>
    <img src="../../dist/img/credit/visa.png" alt="Visa">
    <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
    <img src="../../dist/img/credit/american-express.png" alt="American Express">
    <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
    plugg
    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
    </p>
  </div>

  <div class="col-6">
    <p class="lead">Amount Due 2/22/2014</p>
    <div class="table-responsive">
      <table class="table">
        <tbody>
          <tr>
            <th style="width:50%">Subtotal:</th>
            <td>$250.30</td>
          </tr>
          <tr>
            <th>Tax (9.3%)</th>
            <td>$10.34</td>
          </tr>
          <tr>
            <th>Shipping:</th>
            <td>$5.80</td>
          </tr>
          <tr>
            <th>Total:</th>
            <td>$265.24</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div> -->


<div class="row no-print">
  <div class="col-12">
    <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
    <!-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit Payment
    </button> -->
    <!-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
      <i class="fas fa-download"></i> Generate PDF
    </button> -->
    </div>
  </div>
</div>
<div class="container-fluid text-center">
  <a href="/" class="btn btn-outline-warning btn-back shadow"><b>Kembali</b></a>
</div>  
@endsection