@extends('frontend_layouts/master')

@section('title', 'Checkout')

@section('content')
  <div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{ route('dashboard_frontend.index') }}">home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="Checkout_section mt-60">
    <div class="container">
      <div class="checkout_form">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <form action="#">
                    <h3>Billing Details</h3>
                    <div class="row">
                        <div class="footer_contact">
                            <ul>
                                <li><i class="zmdi zmdi-home"></i><span>Addresss:</span> {{ $user->alamats[0]->alamat }}</li>
                                <li><i class="zmdi zmdi-phone-setting"></i><span>Phone:</span><a href="tel:(+1) 866-540-3229">(+1) 866-540-3229</a> </li>
                                <li><i class="zmdi zmdi-email"></i><span>Email:</span>  info@plazathemes.com</li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-6">
                <form action="#">
                    <h3>Your order</h3>
                    <div class="order_table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($cartItems as $item)
                              @php
                                  $hargaFinal = $item->produk->harga_diskon ? $item->produk->harga_diskon : $item->produk->harga;
                                  $total = $hargaFinal * $item->quantity
                              @endphp
                                <tr>
                                    <td>{{ $item->produk->nama }}<strong> × {{ $item->quantity }}</strong></td>
                                    <td>Rp {{ number_format($total, 2) }}</td>
                                </tr>
                              @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Cart Subtotal</th>
                                    <td>Rp {{ number_format($hargaTotal, 2) }}</td>
                                </tr>
                                {{-- <tr>
                                    <th>Shipping</th>
                                    <td><strong>$5.00</strong></td>
                                </tr> --}}
                                <tr class="order_total">
                                    <th>Order Total</th>
                                    <td><strong>Rp {{ number_format($hargaTotal, 2) }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment_method">
                      <div class="panel-default">
                            <input id="payment" name="check_method" type="radio" data-bs-target="createp_account" />
                            <label for="payment" data-bs-toggle="collapse" data-bs-target="#method" aria-controls="method">Create an account?</label>

                            <div id="method" class="collapse one" data-parent="#accordion">
                                <div class="card-body1">
                                  <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                </div>
                            </div>
                        </div>
                      <div class="panel-default">
                            <input id="payment_defult" name="check_method" type="radio" data-bs-target="createp_account" />
                            <label for="payment_defult" data-bs-toggle="collapse" data-bs-target="#collapsedefult" aria-controls="collapsedefult">PayPal <img src="assets/img/icon/papyel.png" alt=""></label>

                            <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                <div class="card-body1">
                                  <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                </div>
                            </div>
                        </div>
                        <div class="order_button">
                            <button  type="submit">Proceed to PayPal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('additional_js')

@endsection