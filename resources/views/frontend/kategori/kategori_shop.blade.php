@extends('frontend_layouts/master')

@section('title', 'Shop - ' . $kategori->nama)

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
                      <li><a href="{{ route('dashboard_frontend.index') }}">home</a></li>
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
                                <a href="{{ route('produk.detail', $item->slug) }}"><img src="{{ asset('storage/image_produk/' . $item->image) }}"></a>
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
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="false"></i></a></li>
                                        <li class="add_to_cart">
                                            <a title="add to cart" class="add-to-cart-link"
                                               data-product-id="{{ $item->id }}"
                                               data-product-quantity="1"
                                            >
                                                <i class="zmdi zmdi-shopping-cart-plus"></i> add to cart
                                            </a>
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
                                                            <form action="{{ route('cart.addToFormCart') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                                <input min="1" max="{{ $item->stok }}" name="quantity" value="1" type="number">
                                                                <button type="submit">add to cart</button>
                                                                <input type="hidden" id="successMessage" name="successMessage" value="">
                                                            </form>
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