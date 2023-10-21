@extends('admin_layouts/master')

@section('title', 'Edit Order')

@section('additional_css')
  <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center">
      <h4 class="fw-bold py-3">
        <span class="text-muted fw-light"><a href="{{ route('order.index') }}">Order</a> /</span> Detail Order
      </h4>
    </div>

    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible" role="alert">
          {{ $error }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
          </button>
        </div>
      @endforeach
    @endif

    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded mb-4">
      <div class="card-header d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Informasi Order</h5>
      </div>
      <div class="card-body mt-3">
          <table class="table">
            <tr>
                <th>Nomor Order</th>
                <td><b>{{ $order->no_order }}</b></td>
            </tr>
            <tr>
              <th>Status</th>
              <td><b>{{ $order->status }}</b></td>
            </tr>
            <tr>
                <th>Nama Pembeli</th>
                <td><b>{{ $order->customer->nama_depan }} {{ $order->customer->nama_belakang }}</b></td>
            </tr>
            <tr>
                <th>Tanggal Order</th>
                <td><b>{{ Illuminate\Support\Carbon::parse($order->created_at)->locale('id_ID')->isoFormat('D MMMM YYYY') }}</b></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><b>{{ $order->alamat }}</b></td>
            </tr>
            @if ($order->catatan != NULL)
                <tr>
                    <th>Catatan</th>
                    <td><b>{{ $order->catatan }}</b></td>
                </tr>
            @endif
          </table>
          <br>
        <hr>
        <div class="card-header d-flex justify-content-between align-items-center mb-3">
          <h5 class="mb-0">Barang</h5>
        </div>
        @php
            $totalQuantity = 0;
        @endphp
        <table class="table">
          <tr>
            <th>Image</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
          </tr>
          @foreach ($produk_in_order as $item)
            <tr>
              <td><img src="{{ asset('storage/image_produk/' . $item->produk->image) }}" width="100"></td>
              <td>{{ $item->produk->nama }}</td>
              <td>{{ $item->quantity }}</td>
            </tr>
            @php
                $totalQuantity += $item->quantity;
            @endphp
          @endforeach
        </table>
        <br>
        <hr>
        <div class="card-header d-flex justify-content-between align-items-center mb-3">
          <h5 class="mb-0">Total</h5>
        </div>
        <table class="table">
          <tr>
              <th>Jumlah Barang</th>
              <td><b>{{ $totalQuantity}} Item</b></td>
          </tr>
          <tr>
              <th>Total Harga</th>
              <td><b>Rp {{ number_format($order->total_harga, 2) }}</b></td>
          </tr>
        </table>
      </div>
    </div>
@endsection

@section('additional_js')
  <script src="{{ asset('admin_assets/assets/vendor/libs/select2/select2.js') }}"></script>
  <script src="{{ asset('admin_assets/assets/js/form-layouts.js') }}"></script>
@endsection