@extends('frontend_layouts/master')

@section('title', 'Detail Order')

@section('additional_css')

@endsection

@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="breadcrumb_content">
                      <ul>
                          <li><a href="{{ route('dashboard_frontend.index') }}">home</a></li>
                          <li><a href="{{ route('customer.myAccount') }}">My Account</a></li>
                          <li>Detail Order</li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--breadcrumbs area end-->

  <!-- my account start  -->
  <section class="main_content_area">
      <div class="container">
        <hr>
        <h3>Informasi Order</h3>
        <table class="table">
          <tr>
              <th>Nomor Order</th>
              <td><b>{{ $order->no_order }}</b></td>
          </tr>
          <tr>
              <th>Status Order</th>
              <td>
                <b>{{ $order->status }}</b>
            </td>
          </tr>
          <tr>
            <th>Status Pembayaran</th>
            <td>
                <b>{{ ucfirst($order->payment->status) }}</b>
          </td>
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
        @if ($order->status == "Pemesanan")
            <a href="#" class="btn btn-danger m-1" onclick="event.preventDefault(); document.getElementById('form-order-dikirim-{{$order->id}}').submit();">Batalkan Pesanan</a>
            <form id="form-order-dikirim-{{$order->id}}" action="{{ route('customer.detail_order.dibatalkan', $order->id) }}" method="POST" style="display: none;">
                @csrf
                @method('PUT')
            </form>
        @endif
        <br>
        <hr>
        <h2>Barang</h2>
        @php
            $totalQuantity = 0;
        @endphp
        <table class="table">
          <tr>
            <th>Image</th>
            <th>Nama Produk</th>
            <th>Harga Produk</th>
            <th>Jumlah</th>
          </tr>
          @foreach ($produk_in_order as $item)
            <tr>
              <td><img src="{{ asset('storage/image_produk/' . $item->produk->image) }}" width="100"></td>
              <td>{{ $item->produk->nama }}</td>
              @php
                $hargaToShow = $item->produk->harga_diskon != 0 ? number_format($item->produk->harga_diskon, 2) : number_format($item->produk->harga, 2);
              @endphp
              <td>Rp {{ $hargaToShow }}</td>
              <td>{{ $item->quantity }}</td>
            </tr>
            @php
                $totalQuantity += $item->quantity;
            @endphp
          @endforeach
        </table>
        <br>
        <hr>
        <h3>Total</h3>
        <table class="table">
          <tr>
              <th>Jumlah Barang</th>
              <td><b>{{ $totalQuantity}} Item</b></td>
          </tr>
          <tr>
            <th>Shipping</th>
            <td>{{ strtoupper($order->shipping_code) }} - (Rp {{ number_format($order->biaya_shipping, 2) }})</td>
          </tr>
          <tr>
              <th>Total Harga</th>
              <td><b>Rp {{ number_format($order->total_harga, 2) }}</b></td>
          </tr>
        </table>
      </div>
  </section>
  <!-- my account end   -->
@endsection

@section('additional_js')

@endsection