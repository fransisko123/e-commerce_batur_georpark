@extends('frontend_layouts/master')

@section('title', 'Dashboard')

@section('additional_css')
<style>
    @media only screen and (min-width: 992px) {
        .custom_slider{
            height: 500px;
        }
    }
    @media only screen and (max-width: 600px) {
        .custom_slider{
            height: 200px;
        }
    }
</style>
@endsection

@section('content')
<!--slider area start-->
<section class="slider_section mb-50">
  <div class="container-fluid">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('frontend_assets/assets/img/slider/banner_besar1.jpg') }}" class="d-block w-100 custom_slider" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('frontend_assets/assets/img/slider/banner_besar2.jpg') }}" class="d-block w-100 custom_slider" alt="...">
            </div>
        </div>
    </div>
  </div>
</section>
<!--slider area end-->

<div class="banner_area banner_three mb-40">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="single_banner">
                    <div class="banner_thumb">
                        <a href="#"><img src="{{ asset('frontend_assets/assets/img/bg/best_deal.jpg') }}"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

{{-- PRODUCT PILIHAN --}}
<section class="slider_section mb-50">
    <div class="container">
        <div class="section_title section_title_two">
            <h2>Produk Diskon</h2>
        </div>
        <div class="new_product_three_container">
            <div class="row no-gutters shop_wrapper">
                @foreach ($productRecommended as $item)
                <div class="col-lg-3 col-md-4 col-12 ">
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
                            <div class="quick_button">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box_{{ $item->id }}"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
                            </div>
                        </div>
                        <div class="product_content grid_content">
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
                </div>

                {{-- MODAL --}}
                <div class="modal fade" id="modal_box_{{ $item->id }}" tabindex="-1" role="dialog"  aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="modal_body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5 col-sm-12">
                                            <div class="modal_tab">
                                                <div class="tab-content product-details-large">
                                                    <div class="tab-pane fade show active" id="tab1" role="tabpanel" >
                                                        <div class="modal_tab_img">
                                                            <a href="#"><img src="{{ asset('storage/image_produk/' . $item->image) }}" alt=""></a>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="tab-pane fade" id="tab2" role="tabpanel">
                                                        <div class="modal_tab_img">
                                                            <a href="#"><img src="assets/img/product/product24.jpg" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="tab3" role="tabpanel">
                                                        <div class="modal_tab_img">
                                                            <a href="#"><img src="assets/img/product/product25.jpg" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="tab4" role="tabpanel">
                                                        <div class="modal_tab_img">
                                                            <a href="#"><img src="assets/img/product/product22.jpg" alt=""></a>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                                <div class="modal_tab_button">
                                                    <ul class="nav product_navactive owl-carousel" role="tablist">
                                                        {{-- <li >
                                                            <a class="nav-link active" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="{{ asset('storage/image_produk/' . $item->image) }}" alt=""></a>
                                                        </li> --}}
                                                        {{-- <li>
                                                            <a class="nav-link" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><img src="assets/img/product/productbig2.jpg" alt=""></a>
                                                        </li>
                                                        <li>
                                                        <a class="nav-link button_three" data-bs-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><img src="assets/img/product/productbig4.jpg" alt=""></a>
                                                        </li>
                                                        <li>
                                                        <a class="nav-link" data-bs-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false"><img src="assets/img/product/productbig5.jpg" alt=""></a>
                                                        </li> --}}

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-12">
                                            <div class="modal_right">
                                                <div class="modal_title mb-10">
                                                    <h2>{{ $item->nama }}</h2>
                                                </div>
                                                <div class="modal_price mb-10">
                                                    @if ($item->harga_diskon != NULL)
                                                            <span class="current_price">Rp {{ number_format($item->harga_diskon, 2) }}</span>
                                                            <span class="old_price">Rp {{ number_format($item->harga, 2) }}</span>
                                                    @else
                                                            <span class="current_price">Rp {{ number_format($item->harga, 2) }}</span>
                                                    @endif
                                                </div>
                                                <div class="modal_description mb-15">
                                                    <p>{{ $item->deskripsi }}</p>
                                                </div>
                                                <div class="variants_selects">
                                                    {{-- <div class="variants_size">
                                                    <h2>size</h2>
                                                    <select class="select_option">
                                                        <option selected value="1">s</option>
                                                        <option value="1">m</option>
                                                        <option value="1">l</option>
                                                        <option value="1">xl</option>
                                                        <option value="1">xxl</option>
                                                    </select>
                                                    </div> --}}
                                                    {{-- <div class="variants_color">
                                                    <h2>color</h2>
                                                    <select class="select_option">
                                                        <option selected value="1">purple</option>
                                                        <option value="1">violet</option>
                                                        <option value="1">black</option>
                                                        <option value="1">pink</option>
                                                        <option value="1">orange</option>
                                                    </select>
                                                    </div> --}}
                                                    <div class="modal_add_to_cart">
                                                        @if ($item->stok > 0)
                                                            <form action="{{ route('cart.addToFormCart') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                                <input min="1" max="{{ $item->stok }}" name="quantity" value="1" type="number">
                                                                <button type="submit">add to cart</button>
                                                                <input type="hidden" id="successMessage" name="successMessage" value="">
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="modal_social">
                                                    <h2>Share this product</h2>
                                                    <ul>
                                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                        <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                        <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="category_product_area mt-30 mb-50">
    <div class="container">
        <div class="section_title section_title_two">
            <h2>Kategori Rekomendasi</h2>
        </div>
        <div class="row">
            @foreach ($kategori_rekomendasi as $item)
                <div class="col-md-3 mb-4">
                    <div class="category_product_carousel">
                            <div class="category_product_thumb">
                                <a href="{{ route('kategori.shop', $item->slug) }}"><img src="{{ asset('storage/image_kategori_produk/' . $item->image) }}" alt=""></a>
                            </div>
                            <div class="category_product_name">
                                <h2><a href="{{ route('kategori.shop', $item->slug) }}">{{ $item->nama }}</a></h2>
                            </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<div class="banner_area banner_three mb-40">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="single_banner">
                    <div class="banner_thumb">
                        <a href="#"><img src="{{ asset('frontend_assets/assets/img/bg/umkm_batur_geopark.jpg') }}"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- KATEGORI --}}
<section class="category_product_area mt-30 mb-50">
    <div class="container">
        <div class="d-flex justify-content-center mb-3" >
            <h3 style="border-bottom: 2px solid black; padding: 10px;">Kategori</h3>
        </div>
        <div class="row">
            @foreach ($kategori_produk as $item)
                <div class="col-md-3 mb-4">
                    <div class="category_product_carousel">
                            <div class="category_product_thumb">
                                <a href="{{ route('kategori.shop', $item->slug) }}"><img src="{{ asset('storage/image_kategori_produk/' . $item->image) }}" alt=""></a>
                            </div>
                            <div class="category_product_name">
                                <h2><a href="{{ route('kategori.shop', $item->slug) }}">{{ $item->nama }}</a></h2>
                            </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
{{-- END KATEGORI --}}
<div class="container">
    <hr>
</div>
{{-- TOKO--}}
<section class="category_product_area mt-30 mb-50">
    <div class="container">
        <div class="d-flex justify-content-center mb-3" >
            <h3 style="border-bottom: 2px solid black; padding: 10px;">Toko</h3>
        </div>
        <div class="row">
            @foreach ($toko as $item)
                <div class="col-md-3 mb-4">
                    <div class="category_product_carousel">
                            <div class="category_product_thumb">
                                <a href="{{ route('toko.shop', $item->slug) }}"><img src="{{ asset('storage/image_toko/' . $item->image) }}" alt=""></a>
                            </div>
                            <div class="category_product_name">
                                <h2><a href="{{ route('toko.shop', $item->slug) }}">{{ $item->nama }}</a></h2>
                            </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
{{-- END TOKO --}}

<!--custom product area end-->
@endsection

@section('additional_js')

@endsection