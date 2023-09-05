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
                          <h1>Beautiful <span>watch</span></h1>
                          <span>Round the <br> Clock Protection</span>
                          <h2><span>$</span> 79 <span>00</span></h2>
                          <a href="shop.html">shop now</a>
                      </div>
                  </div>
                  <div class="single_slider d-flex align-items-center" data-bgimg="{{ asset('frontend_assets/assets/img/slider/slider6.jpg') }}">
                      <div class="slider_content slider_content_three content_position_left">
                          <h1>products <span>Gear VR</span></h1>
                          <span>Round the <br> Clock Protection</span>
                          <h2><span>$</span> 99 <span>00</span></h2>
                          <a href="shop.html">shop now</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

</section>
<!--slider area end-->

<section class="category_product_area mt-30 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="category_product_carousel">
                        <div class="category_product_thumb">
                            <a href="shop.html"><img src="{{ asset('frontend_assets/assets/img/category/category3.jpg') }}" alt=""></a>
                        </div>
                        <div class="category_product_name">
                            <h2><a href="shop.html">Camera</a></h2>
                        </div>
                </div>
            </div>
            <div class="col-3">
                <div class="category_product_carousel">
                        <div class="category_product_thumb">
                            <a href="shop.html"><img src="{{ asset('frontend_assets/assets/img/category/category3.jpg') }}" alt=""></a>
                        </div>
                        <div class="category_product_name">
                            <h2><a href="shop.html">Camera</a></h2>
                        </div>
                </div>
            </div>
            <div class="col-3">
                <div class="category_product_carousel">
                        <div class="category_product_thumb">
                            <a href="shop.html"><img src="{{ asset('frontend_assets/assets/img/category/category3.jpg') }}" alt=""></a>
                        </div>
                        <div class="category_product_name">
                            <h2><a href="shop.html">Camera</a></h2>
                        </div>
                </div>
            </div>
            <div class="col-3">
                <div class="category_product_carousel">
                        <div class="category_product_thumb">
                            <a href="shop.html"><img src="{{ asset('frontend_assets/assets/img/category/category3.jpg') }}" alt=""></a>
                        </div>
                        <div class="category_product_name">
                            <h2><a href="shop.html">Camera</a></h2>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--custom product area end-->
@endsection

@section('additional_js')

@endsection