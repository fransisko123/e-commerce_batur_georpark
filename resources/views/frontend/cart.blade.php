@extends('frontend_layouts/master')

@section('title', 'Shopping Cart')

@section('content')

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
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
</div>
<!--breadcrumbs area end-->

<!--shopping cart area start -->
<div class="shopping_cart_area mt-60">
  <div class="container">
      <form action="{{ route('cart.updateCart') }}" method="POST">
        @csrf
          <div class="row">
              <div class="col-12">
                  <div class="table_desc">
                      <div class="cart_page table-responsive">
                          <table>
                      <thead>
                          <tr>
                              <th class="product_remove">Hapus</th>
                              <th class="product_thumb">Gambar</th>
                              <th class="product_name">Produk</th>
                              <th class="product-price">Harga</th>
                              <th class="product_quantity">Jumlah</th>
                              <th class="product_total">Total</th>
                          </tr>
                      </thead>
                      <tbody>
                        @if ($cartItems->isEmpty())
                        <tr>
                            <td colspan="6">Keranjang kamu kosong.</td>
                        </tr>
                        @else
                            @foreach ($cartItems as $item)
                                <tr>
                                    <td class="product_remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                    <td class="product_thumb"><a href="#"><img src="{{ asset('storage/image_produk/' . $item->produk->image) }}" width="100"></a></td>
                                    <td class="product_name"><a href="#">{{ $item->produk->nama }}</a></td>
                                        @php
                                            $hargaFinal = $item->produk->harga_diskon ? $item->produk->harga_diskon : $item->produk->harga;
                                            $total = $hargaFinal * $item->quantity
                                        @endphp
                                    <td class="product-price">Rp {{ number_format($hargaFinal, 2) }}</td>
                                    <td class="product_quantity"><label>Jumlah</label> <input min="1" max="100" type="number" value="{{ $item->quantity }}"></td>
                                    <td class="product_total">Rp {{ number_format($total, 2) }}</td>
                                </tr>
                            @endforeach
                        @endif
                      </tbody>
                  </table>
                      </div>
                      <div class="cart_submit">
                          <button type="submit">update cart</button>
                      </div>
                  </div>
               </div>
           </div>
           <!--coupon code area start-->
          <div class="coupon_area">
              <div class="row">
                  <div class="col-lg-6 col-md-6">
                      <div class="coupon_code left">
                          <h3>Coupon</h3>
                          <div class="coupon_inner">
                              <p>Enter your coupon code if you have one.</p>
                              <input placeholder="Coupon code" type="text">
                              <button type="submit">Apply coupon</button>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                      <div class="coupon_code right">
                          <h3>Cart Totals</h3>
                          <div class="coupon_inner">
                             <div class="cart_subtotal">
                                 <p>Subtotal</p>
                                 <p class="cart_amount">£215.00</p>
                             </div>
                             <div class="cart_subtotal ">
                                 <p>Shipping</p>
                                 <p class="cart_amount"><span>Flat Rate:</span> £255.00</p>
                             </div>
                             <a href="#">Calculate shipping</a>

                             <div class="cart_subtotal">
                                 <p>Total</p>
                                 <p class="cart_amount">£215.00</p>
                             </div>
                             <div class="checkout_btn">
                                 <a href="#">Proceed to Checkout</a>
                             </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!--coupon code area end-->
      </form>
  </div>
</div>
<!--shopping cart area end -->

@endsection

@section('additional_js')

@endsection