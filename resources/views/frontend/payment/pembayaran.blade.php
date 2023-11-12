@extends('frontend_layouts/master')

@section('title', 'Pembayaran')

@section('content')

@section('additional_css')
<style>
  .wrapper_image_dan_tombol{
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
      <div class="wrapper_image_dan_tombol">
        <h1>Proses pembayaran</h1>
        <p>Segera lakukan pembayaran, link hanya berlaku 1 jam</p>
        <img src="{{ asset('frontend_assets/assets/img/payment/payment.jpg') }}" width="500">
        <br>
        <span class="btn btn-primary">
          <a href="{{ $payment->checkout_link }}" target="_blank">Link Bayar</a>
        </span>
      </div>
      <hr>
    </div>
  </div>
</div>
<!--shopping cart area end -->

@endsection

@section('additional_js')

@endsection