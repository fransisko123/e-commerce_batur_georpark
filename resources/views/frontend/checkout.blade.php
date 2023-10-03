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
        <form action="{{ route('checkout.checkout_pay') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h3>Billing Details</h3>
                    <div class="row">
                        <div class="footer_contact">
                            <input type="hidden" name="user" value="{{ $user->id }}">
                            <ul>
                                <li><i class="zmdi zmdi-phone-setting"></i><span>Phone:</span>{{ $user->no_telp }}</li>
                                <li><i class="zmdi zmdi-email"></i><span>Email:</span> {{ $user->email }}</li>
                                <li><i class="zmdi zmdi-home"></i><span>Addresss:</span>{{ $user->alamats[0]->alamat }}</li>
                            </ul>
                            <br>
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan (Opsional)</label>
                                <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                              </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
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
                                    <input type="hidden" name="hargaTotal" value="{{ $hargaTotal }}">
                                    <td><strong>Rp {{ number_format($hargaTotal, 2) }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment_method">
                        <div class="order_button">
                            <button  type="submit">Bayar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('additional_js')

@endsection