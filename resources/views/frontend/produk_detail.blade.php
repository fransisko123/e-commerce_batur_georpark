@extends('frontend_layouts/master')

@section('title', 'Detail Produk - {{ $produk->nama }}')

@section('additional_css')
<style>
    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
        }
        .rate:not(:checked) > input {
        position:absolute;
        display: none;
        }
        .rate:not(:checked) > label {
        float:right;
        width:1em;
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:30px;
        color:#ccc;
        }
        .rated:not(:checked) > label {
        float:right;
        width:1em;
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:30px;
        color:#ccc;
        }
        .rate:not(:checked) > label:before {
        content: '★ ';
        }
        .rate > input:checked ~ label {
        color: #ffc700;
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
        color: #deb217;
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
        color: #c59b08;
        }
        .star-rating-complete{
           color: #c59b08;
        }
        .rating-container .form-control:hover, .rating-container .form-control:focus{
        background: #fff;
        border: 1px solid #ced4da;
        }
        .rating-container textarea:focus, .rating-container input:focus {
        color: #000;
        }
        .rated {
        float: left;
        height: 46px;
        padding: 0 10px;
        }
        .rated:not(:checked) > input {
        position:absolute;
        display: none;
        }
        .rated:not(:checked) > label {
        float:right;
        width:1em;
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:30px;
        color:#ffc700;
        }
        .rated:not(:checked) > label:before {
        content: '★ ';
        }
        .rated > input:checked ~ label {
        color: #ffc700;
        }
        .rated:not(:checked) > label:hover,
        .rated:not(:checked) > label:hover ~ label {
        color: #deb217;
        }
        .rated > input:checked + label:hover,
        .rated > input:checked + label:hover ~ label,
        .rated > input:checked ~ label:hover,
        .rated > input:checked ~ label:hover ~ label,
        .rated > label:hover ~ input:checked ~ label {
        color: #c59b08;
        }
        .kategori:hover{
            color: red;
        }
</style>
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
                          <li>product details</li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--breadcrumbs area end-->
  @php
        $user = null;
        if (auth()->guard('customer')->user()) {
            $user = auth()->guard('customer')->user();
        }
    @endphp
   <!--product details start-->
  <div class="product_details mt-50 mb-50">
      <div class="container">
          <div class="row">
              <div class="col-lg-6 col-md-6">
                 <div class="product-details-tab">
                      <div id="img-1" class="zoomWrapper single-zoom" style="text-align: center; border: 0px;">
                          <a href="#">
                              <img id="zoom1" src="{{ asset('storage/image_produk/' . $produk->image) }}" data-zoom-image="{{ asset('storage/image_produk/' . $produk->image) }}" alt="big-1">
                          </a>
                      </div>
                      {{-- <div class="single-zoom-thumb">
                          <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                              <li>
                                  <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{ asset('storage/image_produk/' . $produk->image) }}" data-zoom-image="{{ asset('storage/image_produk/' . $produk->image) }}">
                                      <img src="{{ asset('storage/image_produk/' . $produk->image) }}" alt="zo-th-1"/>
                                  </a>
                              </li>
                          </ul>
                      </div> --}}
                  </div>
              </div>
              <div class="col-lg-6 col-md-6">
                  <div class="product_d_right">
                     {{-- <form action="#"> --}}
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                          <h1>{{ $produk->nama }}</h1>
                          {{-- <div class="product_nav">
                              <ul>
                                  <li class="prev"><a href="product-details.html"><i class="fa fa-angle-left"></i></a></li>
                                  <li class="next"><a href="product-grouped.html"><i class="fa fa-angle-right"></i></a></li>
                              </ul>
                          </div>
                          <div class="product_rating">
                              <ul>
                                  <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                  <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                  <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                  <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                  <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                              </ul>
                          </div> --}}
                          <div class="price_box">
                            @if ($produk->harga_diskon != NULL)
                                  <span class="current_price">Rp {{ number_format($produk->harga_diskon, 2) }}</span>
                                  <span class="old_price">Rp {{ number_format($produk->harga, 2) }}</span>
                            @else
                                  <span class="current_price">Rp {{ number_format($produk->harga, 2) }}</span>
                            @endif
                          </div>
                          <div class="product_desc">
                              <p>{{ $produk->deskripsi }}</p>
                          </div>
                          {{-- <div class="product_variant color">
                              <h3>Available Options</h3>
                              <label>color</label>
                              <ul>
                                  <li class="color1"><a href="#"></a></li>
                                  <li class="color2"><a href="#"></a></li>
                                  <li class="color3"><a href="#"></a></li>
                                  <li class="color4"><a href="#"></a></li>
                              </ul>
                          </div> --}}
                            @if ($produk->stok > 0)
                                <form action="{{ route('cart.addToFormCart') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $produk->id }}">
                                    <div class="product_variant quantity">
                                        <label>quantity</label>
                                        <input min="1" max="{{ $produk->stok }}" name="quantity" value="1" type="number">
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            <li class="add_to_cart">
                                                <button type="submit" class="btn btn-dark"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</button>
                                            </li>
                                            {{-- <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li> --}}
                                            {{-- <li class="compare"><a href="#" title="compare"><i class="zmdi zmdi-swap"></i></a></li> --}}
                                        </ul>
                                    </div>
                                </form>
                            @else
                                <h3>Stok Habis  </h3>
                            @endif
                          <div class="product_meta">
                              <span>Kategori: <a href="{{ route('kategori.shop', $produk->kategori_produk->slug) }}" class="kategori">{{ $produk->kategori_produk->nama }}</a></span>
                          </div>

                      {{-- </form> --}}
                      <div class="priduct_social">
                          <ul>
                              <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>
                              <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>
                              <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a></li>
                              <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i> share</a></li>
                              <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a></li>
                          </ul>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--product details end-->

  <!--product info start-->
  <div class="product_d_info">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="product_d_inner">
                      <div class="product_info_button">
                          <ul class="nav" role="tablist">
                              <li >
                                  <a class="active" data-bs-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Description</a>
                              </li>
                              {{-- <li>
                                   <a data-bs-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Specification</a>
                              </li> --}}
                              <li>
                                 <a data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews ({{ $reviews->count() }})</a>
                              </li>
                          </ul>
                      </div>
                      <div class="tab-content">
                          <div class="tab-pane fade show active" id="info" role="tabpanel" >
                              <div class="product_info_content">
                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>
                                  <p>Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget.</p>
                              </div>
                          </div>

                          <div class="tab-pane fade" id="reviews" role="tabpanel" >
                              <div class="reviews_wrapper">
                                  <h2>{{ $reviews->count() }} review for {{ $produk->nama }}</h2>

                                @foreach ($reviews as $item)
                                  <div class="reviews_comment_box">
                                      <div class="comment_text">
                                          <div class="reviews_meta">
                                              <div class="star_rating">
                                                <ul>
                                                    @for ($i = 1; $i <= $item->stars; $i++)
                                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    @endfor
                                                </ul>
                                              </div>
                                              <p>{{ $item->customer->nama_depan }} {{ $item->customer->nama_belakang }} - {{ Illuminate\Support\Carbon::parse($item->created_at)->locale('id_ID')->isoFormat('D MMMM YYYY') }}</p>
                                              <span>{{ $item->comment }}</span>
                                              <div class="comment_thmb mt-4">
                                                @if ($item->customer_id == $user->id)
                                                    <form action="{{ route('review.destroy', $item->id) }}" method="POST">
                                                        <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="remove-item-btn-on-cart btn btn-danger" type="submit">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                          </div>
                                      </div>
                                    </div>
                                @endforeach

                                  <div class="comment_title">
                                      <h2>Add a review </h2>
                                      {{-- <p>Your email address will not be published.  Required fields are marked </p> --}}
                                  </div>
                                  <div class="product_ratting mb-10">
                                     <h3>Your rating</h3>
                                  </div>
                                  <div class="product_review_form">
                                    <form class="py-2 px-4" action="{{route('review.create')}}" style="box-shadow: 0 0 10px 0 #ddd;" method="POST" autocomplete="off">
                                        @csrf
                                        <p class="font-weight-bold ">Review</p>
                                        <div class="form-group row">
                                           <div class="col">
                                              <div class="rate">
                                                 <input type="radio" id="star5" class="rate" name="rating" value="5"/>
                                                 <label for="star5" title="text">5 stars</label>
                                                 <input type="radio" checked id="star4" class="rate" name="rating" value="4"/>
                                                 <label for="star4" title="text">4 stars</label>
                                                 <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                                                 <label for="star3" title="text">3 stars</label>
                                                 <input type="radio" id="star2" class="rate" name="rating" value="2">
                                                 <label for="star2" title="text">2 stars</label>
                                                 <input type="radio" id="star1" class="rate" name="rating" value="1"/>
                                                 <label for="star1" title="text">1 star</label>
                                              </div>
                                           </div>
                                        </div>
                                        <div class="form-group row mt-4">
                                            @if ($user != null)
                                                <input type="hidden" name="customer_id" value="{{ $user->id }}">
                                                <input type="hidden" name="name" value="{{ $user->nama_depan . ' ' . $user->nama_belakang }}">
                                            @endif
                                            <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                                         </div>
                                        <div class="form-group row mt-4">
                                           <div class="col">
                                              <textarea class="form-control" name="comment" rows="6 " placeholder="Komentar" maxlength="200" name="comment" required></textarea>
                                           </div>
                                        </div>
                                        <div class="mt-3 mb-3 text-right">
                                           <button class="btn btn-sm py-2 px-3 btn-info">Submit
                                           </button>
                                        </div>
                                     </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--product info end-->

  <!--product area start-->
  <section class="product_area related_products mb-47">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="section_title">
                      <h2>Related Products</h2>
                  </div>
                  <div class="product_carousel product_column4 owl-carousel">
                    @foreach ($related_produk as $item)
                      <div class="single_product">
                          <div class="product_thumb">
                            <a href="{{ route('produk.detail', $item->slug) }}">
                                @if ($item->stok < 1)
                                    <img src="{{ asset('storage/image_produk/' . $item->image) }}" style="filter: grayscale(100%);">
                                @else
                                    <img src="{{ asset('storage/image_produk/' . $item->image) }}">
                                @endif
                            </a>
                            @if ($item->harga_diskon != NULL)
                                <div class="label_product">
                                    <span class="label_sale">sale</span>
                                </div>
                            @endif
                          </div>
                          <div class="product_content">
                            <div class="product_name">
                                <h3><a href="{{ route('produk.detail', $item->slug) }}">{{ $item->nama }}</a></h3>
                            </div>
                            <div class="price_box">
                                @if ($item->harga_diskon != NULL)
                                    <span class="current_price">Rp {{ number_format($item->harga_diskon, 2) }}</span>
                                    <span class="old_price">Rp {{ number_format($item->harga, 2) }}</span>
                                @else
                                    <span class="current_price">Rp {{ number_format($item->harga, 2) }}</span>
                                @endif
                            </div>
                            <div class="action_links">
                                <ul>
                                    {{-- <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="false"></i></a></li> --}}
                                    <li class="add_to_cart">
                                        @if ($item->stok < 1)
                                            <h4>Stok Habis</h4>
                                        @else
                                            <a title="add to cart" class="add-to-cart-link"
                                               data-product-id="{{ $item->id }}"
                                               data-product-quantity="1"
                                            >
                                                <i class="zmdi zmdi-shopping-cart-plus"></i> add to cart
                                            </a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!--product area end-->

  <!--product area start-->
  {{-- <section class="product_area upsell_products mb-50">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="section_title">
                      <h2>upsell products</h2>
                  </div>
                  <div class="product_carousel product_column4 owl-carousel">
                      <div class="single_product">
                          <div class="product_thumb">
                              <a href="product-details.html"><img src="assets/img/product/product17.jpg" alt=""></a>
                              <div class="label_product">
                                  <span class="label_sale">sale</span>
                              </div>
                              <div class="quick_button">
                                  <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
                              </div>
                          </div>
                          <div class="product_content">
                              <div class="product_name">
                                  <h3><a href="product-details.html">Aliquam Watches</a></h3>
                              </div>
                              <div class="product_rating">
                                  <ul>
                                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                  </ul>
                              </div>
                               <div class="price_box">
                                  <span class="current_price">$65.00</span>
                                  <span class="old_price">$70.00</span>
                              </div>
                              <div class="action_links">
                                  <ul>
                                     <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                      <li class="add_to_cart"><a href="cart.html" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                                      <li class="compare"><a href="#" title="compare"><i class="zmdi zmdi-swap"></i></a></li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                      <div class="single_product">
                          <div class="product_thumb">
                              <a href="product-details.html"><img src="assets/img/product/product18.jpg" alt=""></a>
                              <div class="quick_button">
                                  <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
                              </div>
                          </div>
                          <div class="product_content">
                              <div class="product_name">
                                  <h3><a href="product-details.html">Condimentum Watches</a></h3>
                              </div>
                              <div class="product_rating">
                                  <ul>
                                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                  </ul>
                              </div>
                               <div class="price_box">
                                  <span class="current_price">$65.00</span>
                                  <span class="old_price">$70.00</span>
                              </div>
                              <div class="action_links">
                                  <ul>
                                     <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                      <li class="add_to_cart"><a href="cart.html" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                                      <li class="compare"><a href="#" title="compare"><i class="zmdi zmdi-swap"></i></a></li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                      <div class="single_product">
                          <div class="product_thumb">
                              <a href="product-details.html"><img src="assets/img/product/product19.jpg" alt=""></a>
                              <div class="label_product">
                                  <span class="label_sale">sale</span>
                              </div>
                              <div class="quick_button">
                                  <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
                              </div>
                          </div>
                          <div class="product_content">
                              <div class="product_name">
                                  <h3><a href="product-details.html">Headphone ipsum</a></h3>
                              </div>
                              <div class="product_rating">
                                  <ul>
                                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                  </ul>
                              </div>
                               <div class="price_box">
                                  <span class="current_price">$65.00</span>
                                  <span class="old_price">$70.00</span>
                              </div>
                              <div class="action_links">
                                  <ul>
                                     <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                      <li class="add_to_cart"><a href="cart.html" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                                      <li class="compare"><a href="#" title="compare"><i class="zmdi zmdi-swap"></i></a></li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                      <div class="single_product">
                          <div class="product_thumb">
                              <a href="product-details.html"><img src="assets/img/product/product20.jpg" alt=""></a>
                              <div class="quick_button">
                                  <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
                              </div>
                          </div>
                          <div class="product_content">
                              <div class="product_name">
                                  <h3><a href="product-details.html">Epicuri per</a></h3>
                              </div>
                              <div class="product_rating">
                                  <ul>
                                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                  </ul>
                              </div>
                               <div class="price_box">
                                  <span class="current_price">$65.00</span>
                                  <span class="old_price">$70.00</span>
                              </div>
                              <div class="action_links">
                                  <ul>
                                     <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                      <li class="add_to_cart"><a href="cart.html" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                                      <li class="compare"><a href="#" title="compare"><i class="zmdi zmdi-swap"></i></a></li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                      <div class="single_product">
                          <div class="product_thumb">
                              <a href="product-details.html"><img src="assets/img/product/product21.jpg" alt=""></a>
                              <div class="label_product">
                                  <span class="label_sale">sale</span>
                              </div>
                              <div class="quick_button">
                                  <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
                              </div>
                          </div>
                          <div class="product_content">
                              <div class="product_name">
                                  <h3><a href="product-details.html">Itaque earum</a></h3>
                              </div>
                              <div class="product_rating">
                                  <ul>
                                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                  </ul>
                              </div>
                               <div class="price_box">
                                  <span class="current_price">$65.00</span>
                                  <span class="old_price">$70.00</span>
                              </div>
                              <div class="action_links">
                                  <ul>
                                     <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                      <li class="add_to_cart"><a href="cart.html" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                                      <li class="compare"><a href="#" title="compare"><i class="zmdi zmdi-swap"></i></a></li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

      </div>
  </section> --}}
  <!--product area end-->
@endsection

@section('additional_js')
<script>
    // Script untuk menangani klik pada bintang
    document.addEventListener('DOMContentLoaded', function () {
        const starRating = document.querySelector('.input_star_rating');
        const stars = starRating.querySelectorAll('a');
        const starsInput = document.getElementById('stars-input');

        stars.forEach(function (star) {
            star.addEventListener('click', function () {
                const rating = this.getAttribute('data-rating');
                highlightStars(rating);
                starsInput.value = rating;
            });
        });

        function highlightStars(rating) {
            stars.forEach(function (star) {
                const starRating = star.getAttribute('data-rating');
                if (starRating <= rating) {
                    star.classList.add('active');
                } else {
                    star.classList.remove('active');
                }
            });
        }
    });
</script>

<script>
    $(document).ready(function () {
        $('.add-to-cart-link').click(function (e) {
            e.preventDefault(); // Prevent the default link behavior

            var productId = $(this).data('product-id');
            var quantity = $(this).data('product-quantity');

            // Check if the customer is authenticated
            @if(auth()->guard('customer')->check())
                // If authenticated, proceed with the AJAX request
                $.ajax({
                    type: 'POST',
                    url: `{{ route('cart.addToCart') }}`,
                    data: {
                        _token: '{{ csrf_token() }}',
                        productId: productId,
                        quantity: quantity
                    },
                    success: function (data) {
                        // Replace the default alert with SweetAlert2
                        Swal.fire({
                            title: 'Success',
                            text: data.message,
                            icon: 'success',
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function (error) {
                        // Handle errors, e.g., show an error message with SweetAlert2
                        Swal.fire({
                            title: 'Error',
                            text: 'Error adding product to cart: ' + error.statusText,
                            icon: 'error',
                        });
                    }
                });
            @else
                // If not authenticated, redirect to the customer login page
                window.location.href = `{{ route('customer.login') }}`;
            @endif
        });
    });
</script>
@endsection