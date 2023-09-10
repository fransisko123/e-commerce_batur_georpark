@extends('frontend_layouts/master')

@section('title', 'Shop - {{ $kategori->nama }}')

@section('additional_css')
<style>
    /* Pagination Container */
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
    font-family: Arial, sans-serif;
}

/* Pagination Link Styles */
.pagination a {
    text-decoration: none;
    padding: 8px 16px;
    margin: 0 4px;
    color: #333;
    background-color: #f5f5f5;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

.pagination a:hover {
    background-color: #555;
    color: #fff;
}

/* Active Page Link */
.pagination a.active {
    background-color: #007bff;
    color: #fff;
}

/* Disabled Link Styles */
.pagination span.disabled {
    padding: 8px 16px;
    margin: 0 4px;
    color: #ccc;
    background-color: #f5f5f5;
    border-radius: 4px;
}

/* Previous and Next Link Styles */
.pagination a[rel="prev"],
.pagination a[rel="next"] {
    font-weight: bold;
}

/* Centered Alignment of Pagination Links */
.pagination-centered {
    justify-content: center;
}

/* Add more CSS for specific styling as needed */
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

                      {{-- <button data-role="grid_list" type="button"  class="btn-list" data-bs-toggle="tooltip" title="List"></button> --}}
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
                    <p>Showing {{ $produks->firstItem() }}–{{ $produks->lastItem() }} of {{ $produks->total() }} results</p>
                  </div>
              </div>
              <!--shop toolbar end-->

                <div class="row no-gutters shop_wrapper">
                    @foreach ($produks as $item)
                    <div class="col-lg-3 col-md-4 col-12 ">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a href="product-details.html"><img src="{{ asset('storage/image_produk/' . $item->image) }}"></a>
                                @if ($item->harga_diskon != NULL)
                                    <div class="label_product">
                                        <span class="label_sale">sale</span>
                                    </div>
                                @endif
                                {{-- <div class="quick_button">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
                                </div> --}}
                            </div>
                            <div class="product_content grid_content">
                                <div class="product_name">
                                    <h3><a href="product-details.html">{{ $item->nama }}</a></h3>
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
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="false"></i></a></li>
                                        <li class="add_to_cart"><a href="cart.html" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Pagination Links -->

                <div class="pagination mt-5 justify-content-center">
                    <div class="pagination">
                        {{-- Previous Page Link --}}
                        @if ($produks->onFirstPage())
                            <span class="disabled">Previous</span>
                        @else
                            <a href="{{ $produks->previousPageUrl() }}" rel="prev">Previous</a>
                        @endif

                        {{-- Page Number Links --}}
                        @for ($i = 1; $i <= $produks->lastPage(); $i++)
                            <a href="{{ $produks->url($i) }}" @if ($i === $produks->currentPage()) class="active" @endif>{{ $i }}</a>
                        @endfor

                        {{-- Next Page Link --}}
                        @if ($produks->hasMorePages())
                            <a href="{{ $produks->nextPageUrl() }}" rel="next">Next</a>
                        @else
                            <span class="disabled">Next</span>
                        @endif
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