@extends('frontend_layouts/master')

@section('title', 'Dashboard')

@section('content')
<!--slider area start-->
<section class="slider_section mb-50">
  <div class="container-fluid">
      <div class="row no-gutters">
          <div class="col-12">
              <div class="slider_area slider_three owl-carousel">
                  <div class="single_slider d-flex align-items-center" data-bgimg="{{ asset('frontend_assets/assets/img/slider/slider5.jpg') }}">
                      <div class="slider_content slider_content_three content_position_center">
                          <h1>Batur <span>geopark</span></h1>
                          <span>Selamat Datang</span>
                          {{-- <h2><span>$</span> 79 <span>00</span></h2> --}}
                          <a href="shop.html">Belanja Sekarang</a>
                      </div>
                  </div>
                  <div class="single_slider d-flex align-items-center" data-bgimg="{{ asset('frontend_assets/assets/img/slider/slider1.jpg') }}">
                      <div class="slider_content slider_content_three content_position_left">
                            <h1>Batur <span>geopark</span></h1>
                            <span>Selamat Datang</span>
                            {{-- <h2><span>$</span> 79 <span>00</span></h2> --}}
                            <a href="shop.html">Belanja Sekarang</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

</section>
<!--slider area end-->

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
                                <a href="shop.html"><img src="{{ asset('storage/image_kategori_produk/' . $item->image) }}" alt=""></a>
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
                                <a href="shop.html"><img src="{{ asset('storage/image_toko/' . $item->image) }}" alt=""></a>
                            </div>
                            <div class="category_product_name">
                                <h2><a href="shop.html">{{ $item->nama }}</a></h2>
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