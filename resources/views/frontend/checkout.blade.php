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

                        <div class="col-lg-6 mb-20">
                            <label>First Name <span>*</span></label>
                            <input type="text">
                        </div>
                        <div class="col-lg-6 mb-20">
                            <label>Last Name  <span>*</span></label>
                            <input type="text">
                        </div>
                        <div class="col-12 mb-20">
                            <label>Company Name</label>
                            <input type="text">
                        </div>
                        <div class="col-12 mb-20">
                            <label for="country">country <span>*</span></label>
                            <select class="niceselect_option" name="cuntry" id="country">
                                <option value="2">bangladesh</option>
                                <option value="3">Algeria</option>
                                <option value="4">Afghanistan</option>
                                <option value="5">Ghana</option>
                                <option value="6">Albania</option>
                                <option value="7">Bahrain</option>
                                <option value="8">Colombia</option>
                                <option value="9">Dominican Republic</option>

                            </select>
                        </div>

                        <div class="col-12 mb-20">
                            <label>Street address  <span>*</span></label>
                            <input placeholder="House number and street name" type="text">
                        </div>
                        <div class="col-12 mb-20">
                            <input placeholder="Apartment, suite, unit etc. (optional)" type="text">
                        </div>
                        <div class="col-12 mb-20">
                            <label>Town / City <span>*</span></label>
                            <input  type="text">
                        </div>
                        <div class="col-12 mb-20">
                            <label>State / County <span>*</span></label>
                            <input type="text">
                        </div>
                        <div class="col-lg-6 mb-20">
                            <label>Phone<span>*</span></label>
                            <input type="text">

                        </div>
                        <div class="col-lg-6 mb-20">
                            <label> Email Address   <span>*</span></label>
                              <input type="text">

                        </div>
                        <div class="col-12 mb-20">
                            <input id="account" type="checkbox" data-bs-target="createp_account" />
                            <label for="account" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-controls="collapseOne">Create an account?</label>

                            <div id="collapseOne" class="collapse one" data-parent="#accordion">
                                <div class="card-body1">
                                  <label> Account password   <span>*</span></label>
                                    <input placeholder="password" type="password">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-20">
                            <input id="address" type="checkbox" data-bs-target="createp_account" />
                            <label class="righ_0" for="address" data-bs-toggle="collapse" data-bs-target="#collapsetwo" aria-controls="collapseOne">Ship to a different address?</label>

                            <div id="collapsetwo" class="collapse one" data-parent="#accordion">
                              <div class="row">
                                    <div class="col-lg-6 mb-20">
                                        <label>First Name <span>*</span></label>
                                        <input type="text">
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <label>Last Name  <span>*</span></label>
                                        <input type="text">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label>Company Name</label>
                                        <input type="text">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <div class="select_form_select">
                                            <label for="countru_name">country <span>*</span></label>
                                            <select class="niceselect_option" name="cuntry" id="countru_name">
                                                <option value="2">bangladesh</option>
                                                <option value="3">Algeria</option>
                                                <option value="4">Afghanistan</option>
                                                <option value="5">Ghana</option>
                                                <option value="6">Albania</option>
                                                <option value="7">Bahrain</option>
                                                <option value="8">Colombia</option>
                                                <option value="9">Dominican Republic</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-20">
                                        <label>Street address  <span>*</span></label>
                                        <input placeholder="House number and street name" type="text">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <input placeholder="Apartment, suite, unit etc. (optional)" type="text">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label>Town / City <span>*</span></label>
                                        <input  type="text">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label>State / County <span>*</span></label>
                                        <input type="text">
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <label>Phone<span>*</span></label>
                                        <input type="text">

                                    </div>
                                    <div class="col-lg-6">
                                        <label> Email Address   <span>*</span></label>
                                          <input type="text">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="order-notes">
                                <label for="order_note">Order Notes</label>
                                <textarea id="order_note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
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
                                <tr>
                                    <th>Shipping</th>
                                    <td><strong>$5.00</strong></td>
                                </tr>
                                <tr class="order_total">
                                    <th>Order Total</th>
                                    <td><strong>$220.00</strong></td>
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