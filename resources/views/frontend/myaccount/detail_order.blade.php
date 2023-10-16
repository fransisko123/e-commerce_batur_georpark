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
        <h2>Barang</h2>
        <table class="table">
          <tr>
            <th>Image</th>
            <th>Nama Produk</th>
          </tr>
          @foreach ($produk_in_order as $item)
            <tr>
              <td><img src="{{ asset('storage/image_produk/' . $item->image) }}" width="100"></td>
              <td>{{ $item->nama }}</td>
            </tr>
          @endforeach
        </table>
      </div>
  </section>
  <!-- my account end   -->
@endsection

@section('additional_js')

@endsection