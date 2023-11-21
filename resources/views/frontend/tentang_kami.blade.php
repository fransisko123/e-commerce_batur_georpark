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
              <h2>Museum Batur Geopark</h2>
              <hr>
              <p style="font-size: 16px;">
                Museum yang berada di selatan Gunung Batur ini menyajikan informasi geopark nasional dan geopark global. Ruangan peragaan museum berdasarkan konsep geopark atau taman bumi, terdiri dari keanekaragaman geologi, hayati, dan budaya. Keanekaragaman geologi umumnya diisi oleh batuan produk letusan Gunung Batur.
              </p>
          </div>
          <div class="col-md-6">
              <img src="{{ asset('frontend_assets/assets/img/slider/museum_batur_banner.jpg') }}" alt="Batur Geopark" class="img-fluid">
          </div>
      </div>
  </div>
</section>

<!-- Nilai Geopark Section -->
<section class="geopark_values_section mt-5">
  <div class="container">
      <div class="row">
          <div class="col-md-6">
              <img src="{{ asset('frontend_assets/assets/img/about/nilai_batur.jpg') }}" alt="Nilai Geopark" class="img-fluid">
          </div>
          <div class="col-md-6">
              <h2>Nilai Geopark</h2>
              <hr>
              <p style="font-size: 16px;">
                  Batur Geopark berkomitmen untuk melestarikan keanekaragaman hayati dan geologi. Kami aktif terlibat dalam program konservasi untuk menjaga ekosistem unik di sekitar Gunung Batur. Selain itu, kami mempromosikan pendidikan lingkungan dan kesadaran masyarakat untuk ikut berperan dalam pelestarian alam.
              </p>
              <p style="font-size: 16px;">
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
                  <img src="{{ asset('frontend_assets/assets/img/about/kebumian.png') }}" alt="Koleksi Museum 1" class="img-fluid">
                  <h3>Kebumian</h3>
                  <p>Setiap artefak menceritakan kisah panjang perkembangan bumi, dari masa pra-sejarah hingga zaman modern. Sentuhan interaktif memungkinkan pengunjung untuk menyelami proses geologis yang membentuk bumi, sementara panduan ahli memberikan wawasan mendalam tentang misteri dan keajaiban alam yang tersembunyi di bawah permukaan..</p>
              </div>
          </div>
          <div class="col-md-4">
              <div class="museum_item">
                  <img src="{{ asset('frontend_assets/assets/img/about/hayati.png') }}" alt="Koleksi Museum 2" class="img-fluid">
                  <h3>Hayati</h3>
                  <p>Sebuah perjalanan luar biasa ke dalam keanekaragaman kehidupan yang menghiasi Batur Geopark. Setiap langkah di dalam museum ini membuka pintu ke alam liar yang unik, di mana flora dan fauna berkumpul dalam harmoni yang menakjubkan..</p>
              </div>
          </div>
          <div class="col-md-4">
              <div class="museum_item">
                  <img src="{{ asset('frontend_assets/assets/img/about/kebudayaan.png') }}" alt="Koleksi Museum 3" class="img-fluid">
                  <h3>Kebudayaan</h3>
                  <p>Sebuah tempat yang mengungkapkan kekayaan budaya dan warisan yang membanggakan dari Pulau Bali. Museum ini adalah pintu gerbang menuju ke dalam sejarah yang kaya dan keberagaman budaya yang menjadi bagian integral dari Batur Geopark..</p>
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
              <img src="{{ asset('frontend_assets/assets/img/about/wisatawan.png') }}" alt="Pengalaman Wisata" class="img-fluid">
          </div>
          <div class="col-md-6">
              <p>
                Di dalam perjalanan ini, Anda akan dibawa melintasi lorong waktu yang membuka tabir misteri masa lalu. Tim arkeolog yang berpengetahuan luas akan memandu langkah Anda untuk menemukan petunjuk-petunjuk yang mengungkapkan kisah panjang kehidupan masyarakat yang pernah menghuni daerah sekitar Gunung Batur. Setiap puing sejarah, artefak, dan struktur batu yang tersembunyi di antara rerimbunan alam menggambarkan perjalanan waktu yang menggetarkan.
              </p>
              <p>
                Tidak hanya sebatas penggalian arkeologis, kunjungan ini juga menjadi kesempatan untuk menyelami keindahan alam sekitar Gunung Batur yang menambahkan nuansa magis pada perjalanan sejarah ini. Sebuah pengalaman yang menggabungkan kecintaan pada arkeologi dengan keajaiban alam yang spektakuler, memberikan kenangan tak terlupakan bagi setiap pengunjung yang merindukan petualangan sejarah yang sesungguhnya. Selamat menelusuri warisan sejarah yang tersembunyi di kaki Gunung Batur!
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