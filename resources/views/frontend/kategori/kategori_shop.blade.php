@extends('frontend_layouts/master')

@section('title', 'Shop - {{ $kategori->nama }}')

@section('content')

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
  <div class="container">
      <div class="row">
          <div class="col-12">
              <div class="breadcrumb_content">
                  <ul>
                      <li><a href="index-2.html">home</a></li>
                      <li>Produk {{ $kategori->nama }}</li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
</div>
<!--breadcrumbs area end-->

<!--shop  area start-->
<div class="shop_area shop_fullwidth mt-47 mb-50">
  <div class="container">
      <div class="row">
          <div class="col-12">
              <!--shop wrapper start-->
              <!--shop toolbar start-->
              <div class="shop_title">
                  <h1>Produk {{ $kategori->nama }}</h1>
              </div>
              <div class="shop_toolbar_wrapper">
                  <div class="shop_toolbar_btn">

                      <button data-role="grid_3" type="button" class=" btn-grid-3" data-bs-toggle="tooltip" title="3"></button>

                      <button data-role="grid_4" type="button"  class="active btn-grid-4" data-bs-toggle="tooltip" title="4"></button>

                      <button data-role="grid_list" type="button"  class="btn-list" data-bs-toggle="tooltip" title="List"></button>
                  </div>
                  <div class=" niceselect_option">

                      <form class="select_option" action="#">
                          <select name="orderby" id="short">

                              <option selected value="1">Sort by average rating</option>
                              <option  value="2">Sort by popularity</option>
                              <option value="3">Sort by newness</option>
                              <option value="4">Sort by price: low to high</option>
                              <option value="5">Sort by price: high to low</option>
                              <option value="6">Product Name: Z</option>
                          </select>
                      </form>


                  </div>
                  <div class="page_amount">
                      <p>Showing 1–9 of 21 results</p>
                  </div>
              </div>
              <!--shop toolbar end-->

               <div class="row no-gutters shop_wrapper">
                  <div class="col-lg-3 col-md-4 col-12 ">
                      <div class="single_product">
                          <div class="product_thumb">
                              <a href="product-details.html"><img src="{{ asset('frontend_assets/assets/img/product/product15.jpg') }}" alt=""></a>
                              <div class="label_product">
                                  <span class="label_sale">sale</span>
                              </div>
                              {{-- <div class="quick_button">
                                  <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
                              </div> --}}
                          </div>
                          <div class="product_content grid_content">
                              <div class="product_name">
                                  <h3><a href="product-details.html">Produk 1</a></h3>
                              </div>
                               <div class="price_box">
                                  <span class="current_price">$64.00</span>
                                  <span class="old_price">$71.00</span>
                              </div>
                              <div class="action_links">
                                  <ul>
                                     <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="false"></i></a></li>
                                      <li class="add_to_cart"><a href="cart.html" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
              <!--shop toolbar end-->
              <!--shop wrapper end-->
        </div>
  </div>
</div>
</div>
<!--shop  area end-->

@endsection

@section('additional_js')

@endsection