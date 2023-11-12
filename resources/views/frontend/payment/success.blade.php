@extends('frontend_layouts/master')

@section('title', 'Pembayaran')

@section('content')

@section('additional_css')
<style>
  .wrapper_image{
    text-align: center;
    margin-bottom: 20px;
  }
</style>
@endsection

<!--breadcrumbs area start-->
{{-- <div class="breadcrumbs_area">
  <div class="container">
      <div class="row">
          <div class="col-12">
              <div class="breadcrumb_content">
                  <ul>
                      <li><a href="{{ route('dashboard_frontend.index') }}">home</a></li>
                      <li>Shopping Cart</li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
</div> --}}
<!--breadcrumbs area end-->

<!--shopping cart area start -->
<div class="shopping_cart_area mt-60">
  <div class="container">
    <div class="checkout_form">
      <div class="wrapper_image">
        <h1>Pembayaran berhasil</h1>
        <img src="{{ asset('frontend_assets/assets/img/payment/success.webp') }}" width="300">
        <p style="font-size: 18px">Terima kasih telah berbelanja di toko kami</p>
        <p>Admin kami akan mengecek kembali transaksi kamu.</p>
      </div>
    </div>
    <hr>
  </div>
</div>
<!--shopping cart area end -->

@endsection

@section('additional_js')

@endsection