@extends('frontend_layouts/master')

@section('title', 'Tentang Kami')

@section('content')
<!--slider area start-->
<section class="slider_section mb-50">
  <div class="container-fluid">
      <div class="row no-gutters">
          <div class="col-12">
              <div class="slider_area slider_three owl-carousel">
                <div class="single_slider d-flex align-items-center" data-bgimg="{{ asset('frontend_assets/assets/img/slider/museum_batur_banner2.png') }}">
                  <div class="slider_content slider_content_three content_position_left">
                        <span style="color: white">Selamat Datang di</span>
                        <h1 style="color: white">Batur <span style="color: white">geopark</span></h1>
                        {{-- <h2><span>$</span> 79 <span>00</span></h2> --}}
                        {{-- <a href="shop.html">Belanja Sekarang</a> --}}
                  </div>
                  </div>
                  <div class="single_slider d-flex align-items-center" data-bgimg="{{ asset('frontend_assets/assets/img/slider/tentang_kami_banner.jpeg') }}">
                      {{-- <div class="slider_content slider_content_three content_position_center">
                          <span>Selamat Datang di</span>
                          <h1>Batur <span>geopark</span></h1>
                          <h2><span>$</span> 79 <span>00</span></h2>
                          <a href="shop.html">Belanja Sekarang</a>
                      </div> --}}
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

<section class="about_us_section mt-5">
  <div class="container">
      <div class="row">
          <div class="col-md-6">
              <h2>Tentang Kami</h2>
              <p>
                  Batur Geopark adalah destinasi yang menakjubkan yang menggabungkan keindahan alam dan nilai geologis tinggi.
                  Dengan pemandangan Gunung Batur yang megah, kami mengundang Anda untuk menjelajahi keajaiban alam dan kebudayaan di sekitarnya.
                  Kunjungi museum kami dan temukan keindahan serta keunikannya.
              </p>
          </div>
          <div class="col-md-6">
              <img src="{{ asset('frontend_assets/assets/img/about/batur_geopark.jpg') }}" alt="Batur Geopark" class="img-fluid">
          </div>
      </div>
  </div>
</section>

<!-- Nilai Geopark Section -->
<section class="geopark_values_section mt-5">
  <div class="container">
      <div class="row">
          <div class="col-md-6">
              <img src="{{ asset('frontend_assets/assets/img/about/geopark_values.jpg') }}" alt="Nilai Geopark" class="img-fluid">
          </div>
          <div class="col-md-6">
              <h2>Nilai Geopark</h2>
              <p>
                  Batur Geopark berkomitmen untuk melestarikan keanekaragaman hayati dan geologi. Kami aktif terlibat dalam program konservasi untuk menjaga ekosistem unik di sekitar Gunung Batur. Selain itu, kami mempromosikan pendidikan lingkungan dan kesadaran masyarakat untuk ikut berperan dalam pelestarian alam.
              </p>
              <p>
                  Dengan memadukan keindahan alam, budaya, dan keberlanjutan, Batur Geopark memberikan pengalaman yang mendalam dan mendidik bagi semua pengunjung. Bergabunglah dengan kami untuk merayakan keajaiban geologi dan menelusuri jejak sejarah yang terpahat di lereng Gunung Batur.
              </p>
          </div>
      </div>
  </div>
</section>
<!-- End Nilai Geopark Section -->

<!-- Koleksi Museum Section -->
<section class="museum_collection_section mt-5">
  <div class="container">
      <h2>Koleksi Museum</h2>
      <div class="row">
          <div class="col-md-4">
              <div class="museum_item">
                  <img src="{{ asset('frontend_assets/assets/img/museum/collection1.jpg') }}" alt="Koleksi Museum 1" class="img-fluid">
                  <h3>Keramik Arkeologis</h3>
                  <p>Koleksi keramik kuno yang menggambarkan kehidupan masyarakat pada zaman prasejarah.</p>
              </div>
          </div>
          <div class="col-md-4">
              <div class="museum_item">
                  <img src="{{ asset('frontend_assets/assets/img/museum/collection2.jpg') }}" alt="Koleksi Museum 2" class="img-fluid">
                  <h3>Batuan Vulkanik</h3>
                  <p>Sejumlah batuan vulkanik langka yang membentuk puncak Gunung Batur.</p>
              </div>
          </div>
          <div class="col-md-4">
              <div class="museum_item">
                  <img src="{{ asset('frontend_assets/assets/img/museum/collection3.jpg') }}" alt="Koleksi Museum 3" class="img-fluid">
                  <h3>Seni Lukis Lokal</h3>
                  <p>Karya seniman lokal yang terinspirasi oleh keindahan alam sekitar.</p>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- End Koleksi Museum Section -->

<!-- Pengalaman Wisata Section -->
<section class="tour_experience_section mt-5">
  <div class="container">
      <h2>Pengalaman Wisata di Batur Geopark</h2>
      <div class="row">
          <div class="col-md-6">
              <img src="{{ asset('frontend_assets/assets/img/experience/tour_experience.jpg') }}" alt="Pengalaman Wisata" class="img-fluid">
          </div>
          <div class="col-md-6">
              <p>
                  Bergabunglah dalam petualangan tak terlupakan di Batur Geopark. Kami menawarkan berbagai pengalaman wisata yang dapat memikat selera petualangan Anda.
              </p>
              <p>
                  Nikmati trekking mendebarkan ke puncak Gunung Batur yang menawarkan pemandangan spektakuler matahari terbit. Rasakan kehangatan alam melalui sumber air panas alami yang terletak di sekitar kawasan geopark.
              </p>
              <p>
                  Bagi para pecinta arkeologi, jangan lewatkan kunjungan ke situs-situs bersejarah yang tersembunyi di tengah keindahan alam Gunung Batur. Tim arkeolog kami akan memandu Anda untuk menjelajahi jejak-jejak sejarah yang menarik.
              </p>
          </div>
      </div>
  </div>
</section>
<!-- End Pengalaman Wisata Section -->

<!--custom product area end-->
@endsection

@section('additional_js')

@endsection