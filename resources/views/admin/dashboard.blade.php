@extends('admin_layouts/master')

@section('title', 'Dashboard')

@section('additional_css')
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"> --}}
@endsection

@section('content')
    @if(session('status'))
      <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
      </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h4 class="fw py-3 mb-4">
      <b>Dashboard</b>
      </h4>
    </div>
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded mb-4 card-datatable table-responsive pt-3">
      <h4 class="py-3">
        <b>Analisis Produk</b>
      </h4>
      <div class="row">
        {{-- PRODUK DENGAN REVIEW TERBAIK --}}
        <div class="col-md-6 col-lg-6 mb-4">
          <div class="card h-100 shadow rounded bg-white dark:bg-gray-800">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="card-title m-0 me-2">Produk dengan review terbaik</h5>
            </div>
            <div class="card-body pb-0">
              <div class="d-flex align-items-center gap-3 mb-3">
                <h1 class="display-3 mb-0">{{ number_format($bestReviewProduct->average_stars, 1) }}</h1>
                <div class="ratings">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $bestReviewProduct->average_stars)
                            <i class="bx bxs-star bx-sm text-warning"></i>
                        @else
                            <i class="bx bx-star bx-sm text-warning"></i>
                        @endif
                    @endfor
                </div>
              </div>
              <ul class="p-0 m-0">
                <li class="d-flex mb-4 pb-1">
                  <div class="avatar flex-shrink-0 me-3">
                    <img src="{{ asset('storage/image_produk/' . $bestReviewProduct->image) }}" alt="Surface">
                  </div>
                  <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                    <div class="me-2">
                      <h4 class="mb-0">{{ $bestReviewProduct->nama }}</h4>
                      <small class="text-muted d-block mb-1">{{ $bestReviewProduct->kategori_produk->nama }}</small>
                    </div>
                    <div class="user-progress d-flex align-items-center gap-1">
                      @php
                          $hargaToShow = $bestReviewProduct->harga_diskon != 0 ? number_format($bestReviewProduct->harga_diskon, 2) : number_format($bestReviewProduct->harga, 2);
                      @endphp
                      {{-- <span class="fw-medium">Rp {{ $hargaToShow }}</span> --}}
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>

        {{-- PRODUK DENGAN REVIEW TERBURUK --}}
        <div class="col-md-6 col-lg-6 mb-4">
          <div class="card h-100 shadow rounded bg-white dark:bg-gray-800">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="card-title m-0 me-2">Produk dengan review terburuk</h5>
            </div>
            <div class="card-body pb-0">
              <div class="d-flex align-items-center gap-3 mb-3">
                <h1 class="display-3 mb-0">{{ number_format($worstReviewProduct->average_stars, 1) }}</h1>
                <div class="ratings">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $worstReviewProduct->average_stars)
                            <i class="bx bxs-star bx-sm text-warning"></i>
                        @else
                            <i class="bx bx-star bx-sm text-warning"></i>
                        @endif
                    @endfor
                </div>
              </div>
              <ul class="p-0 m-0">
                <li class="d-flex mb-4 pb-1">
                  <div class="avatar flex-shrink-0 me-3">
                    <img src="{{ asset('storage/image_produk/' . $worstReviewProduct->image) }}" alt="Surface">
                  </div>
                  <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                    <div class="me-2">
                      <h4 class="mb-0">{{ $worstReviewProduct->nama }}</h4>
                      <small class="text-muted d-block mb-1">{{ $worstReviewProduct->kategori_produk->nama }}</small>
                    </div>
                    <div class="user-progress d-flex align-items-center gap-1">
                      @php
                          $hargaToShow = $worstReviewProduct->harga_diskon != 0 ? number_format($worstReviewProduct->harga_diskon, 2) : number_format($worstReviewProduct->harga, 2);
                      @endphp
                      {{-- <span class="fw-medium">Rp {{ $hargaToShow }}</span> --}}
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        {{-- PRODUK BEST SELLER --}}
        <div class="col-md-6 col-lg-6 mb-4">
          <div class="card h-100 shadow rounded bg-white dark:bg-gray-800">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="card-title m-0 me-2">Produk Paling Banyak Terjual</h5>
              <h6 class="card-title m-0 me-2">Terjual Sebanyak {{ $bestSellerProduct->total_quantity }} item</h6>
            </div>
            <div class="card-body pb-0">
              <ul class="p-0 m-0">
                <li class="d-flex mb-4 pb-1">
                  <div class="avatar flex-shrink-0 me-3">
                    <img src="{{ asset('storage/image_produk/' . $bestSellerProduct->image) }}" alt="Surface">
                  </div>
                  <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                    <div class="me-2">
                      <h4 class="mb-0">{{ $bestSellerProduct->nama }}</h4>
                      <small class="text-muted d-block mb-1">{{ $bestSellerProduct->kategori_produk->nama }}</small>
                    </div>
                    <div class="user-progress d-flex align-items-center gap-1">
                      <p>Total Revenue : </p>
                      <br>
                      <p>Rp {{ number_format($bestSellerProduct->total_revenue) }}</p>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>

        {{-- PRODUK DENGAN KLIK TERBANYAK--}}
        <div class="col-md-6 col-lg-6 mb-4">
          <div class="card h-100 shadow rounded bg-white dark:bg-gray-800">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="card-title m-0 me-2">Produk dengan klik terbanyak</h5>
            </div>
            <div class="card-body pb-0">
              <ul class="p-0 m-0">
                <li class="d-flex mb-4 pb-1">
                  <div class="avatar flex-shrink-0 me-3">
                    <img src="{{ asset('storage/image_produk/' . $mostClicksProduct->image) }}" alt="Surface">
                  </div>
                  <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                    <div class="me-2">
                      <h4 class="mb-0">{{ $mostClicksProduct->nama }}</h4>
                      <small class="text-muted d-block mb-1">{{ $mostClicksProduct->kategori_produk->nama }}</small>
                    </div>
                    <div class="user-progress d-flex align-items-center gap-1">
                      <span class="fw-medium">DI klik sebanyak {{ $mostClicksProduct->click_count }} kali</span>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('additional_js')
<script src="{{ asset('admin_assets/assets/js/ui-modals.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
{{-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> --}}
@endsection