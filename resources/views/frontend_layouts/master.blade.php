<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.net/pallas/pallas/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Aug 2023 13:10:35 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>E-Commerce | @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend_assets/assets/img/favicon.ico') }}">

    <!-- CSS
    ========================= -->

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('frontend_assets/assets/css/plugins.css') }}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend_assets/assets/css/style.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

    @yield('additional_css')

</head>

<body>

    <!--header area start-->
    <header class="header_area header_color">
        <!--header top start-->
        <div class="header_top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                       <div class="welcome_text">
                            @auth('customer')
                                <p>Welcome {{ auth('customer')->user()->nama }} to <span>Ecommerce Batur Geopark</span></p>
                            @else
                                <p>Welcome to <span>Ecommerce Batur Geopark</span></p>
                            @endauth
                       </div>
                    </div>
                    @if(auth()->guard('customer')->check())
                        <div class="col-lg-8">
                            <div class="top_right text-right">
                                <ul>
                                    <li class="top_links"><a href="#"><i class="zmdi zmdi-account"></i> My account <i class="zmdi zmdi-caret-down"></i></a>
                                        <ul class="dropdown_links">
                                            <li><a href="{{ route('customer.myAccount') }}">My Account </a></li>
                                            <li><a href="{{ route('cart.shopping_cart') }}">Shopping Cart</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!--header top start-->

        <!--header middel start-->
        <div class="header_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                       <div class="categories_menu categori_three">
                            <div class="categories_title">
                                <h2 class="categori_toggle">Categories</h2>
                            </div>
                            <div class="categories_menu_toggle">
                                <ul>
                                    <li class="menu_item_children categorie_list"><a href="#"><span><i class="zmdi zmdi-desktop-mac"></i></span> Electronic <i class="fa fa-angle-right"></i></a>
                                        <ul class="categories_mega_menu">
                                            <li class="menu_item_children"><a href="#">Wheel Bearings</a>
                                                <ul class="categorie_sub_menu">
                                                    <li><a href="#">Bower</a></li>
                                                    <li><a href="#">Flipbac</a></li>
                                                    <li><a href="#">Gary Fong</a></li>
                                                    <li><a href="#">GigaPan</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children"><a href="#">Wheel Rim Screws</a>
                                                <ul class="categorie_sub_menu">
                                                    <li><a href="#">Accessories</a></li>
                                                    <li><a href="#">2-Stroke</a></li>
                                                    <li><a href="#">Handbag</a></li>
                                                    <li><a href="#">Clothing</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children last_child"><a href="#">Wheel Simulators</a>
                                                    <ul class="categorie_sub_menu">
                                                        <li><a href="#">Bags & Cases</a></li>
                                                        <li><a href="#">Binoculars & Scopes</a></li>
                                                        <li><a href="#">Film Photography</a></li>
                                                        <li><a href="#">Lighting & Studio</a></li>
                                                    </ul>
                                            </li>

                                        </ul>
                                    </li>
                                    <li class="menu_item_children"><a href="#"><span><i class="zmdi zmdi-image"></i></span>  Fashion & Beauty <i class="fa fa-angle-right"></i></a>
                                        <ul class="categories_mega_menu column_3">
                                            <li class="menu_item_children"><a href="#">Chair</a>
                                                <div class="categorie_sub_menu">
                                                    <ul>
                                                        <li><a href="#">Dining room</a></li>
                                                        <li><a href="#">bedroom</a></li>
                                                        <li><a href="#"> Home & Office</a></li>
                                                        <li><a href="#">living room</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="menu_item_children"><a href="#">Lighting</a>
                                                <div class="categorie_sub_menu">
                                                    <ul>
                                                        <li><a href="#">Ceiling Lighting</a></li>
                                                        <li><a href="#">Wall Lighting</a></li>
                                                        <li><a href="#">Outdoor Lighting</a></li>
                                                        <li><a href="#">Smart Lighting</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="menu_item_children"><a href="#">Sofa</a>
                                                <div class="categorie_sub_menu">
                                                    <ul>
                                                        <li><a href="#">Fabric Sofas</a></li>
                                                        <li><a href="#">Leather Sofas</a></li>
                                                        <li><a href="#">Corner Sofas</a></li>
                                                        <li><a href="#">Sofa Beds</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu_item_children"><a href="#"><span><i class="zmdi zmdi-camera"></i></span> Camera & Photo <i class="fa fa-angle-right"></i></a>
                                        <ul class="categories_mega_menu column_2">
                                            <li class="menu_item_children"><a href="#">Brake Tools</a>
                                                <div class="categorie_sub_menu">
                                                    <ul>
                                                        <li><a href="#">Driveshafts</a></li>
                                                        <li><a href="#">Spools</a></li>
                                                        <li><a href="#">Diesel </a></li>
                                                        <li><a href="#">Gasoline</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="menu_item_children"><a href="#">Emergency Brake</a>
                                                <div class="categorie_sub_menu">
                                                    <ul>
                                                        <li><a href="#">Dolls for Girls</a></li>
                                                        <li><a href="#">Girls' Learning Toys</a></li>
                                                        <li><a href="#">Arts and Crafts for Girls</a></li>
                                                        <li><a href="#">Video Games for Girls</a></li>
                                                    </ul>
                                                </div>
                                            </li>

                                        </ul>
                                    </li>
                                    <li class="menu_item_children"><a href="#"><span><i class="zmdi zmdi-dribbble"></i></span> Sport & Outdoor <i class="fa fa-angle-right"></i></a>
                                        <ul class="categories_mega_menu column_2">
                                            <li class="menu_item_children"><a href="#">Check Trousers</a>
                                                <div class="categorie_sub_menu">
                                                    <ul>
                                                        <li><a href="#">Building</a></li>
                                                        <li><a href="#">Electronics</a></li>
                                                        <li><a href="#">action figures </a></li>
                                                        <li><a href="#">specialty & boutique toy</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="menu_item_children"><a href="#">Calculators</a>
                                                <div class="categorie_sub_menu">
                                                    <ul>
                                                        <li><a href="#">Dolls for Girls</a></li>
                                                        <li><a href="#">Girls' Learning Toys</a></li>
                                                        <li><a href="#">Arts and Crafts for Girls</a></li>
                                                        <li><a href="#">Video Games for Girls</a></li>
                                                    </ul>
                                                </div>
                                            </li>

                                        </ul>
                                    </li>
                                    <li><a href="#"><span><i class="zmdi zmdi-tv"></i></span> TV & Audio</a></li>
                                    <li><a href="#"><span><i class="zmdi zmdi-tv-list"></i></span> home funiture</a></li>
                                    <li><a href="#"><span><i class="zmdi zmdi-cake"></i></span> toys for kids</a></li>
                                    <li><a href="#"><span><i class="zmdi zmdi-memory"></i></span> Memory Cards</a></li>
                                    <li><a href="#"><span><i class="zmdi zmdi-case-download"></i></span> Living Room</a></li>
                                   <li class="hidden"><a href="shop-left-sidebar.html">New Sofas</a></li>
                                    <li class="hidden"><a href="shop-left-sidebar.html">Sleight Sofas</a></li>
                                    <li><a href="#" id="more-btn"><i class="fa fa-plus" aria-hidden="true"></i> More Categories</a></li>
                                </ul>
                            </div>
                        </div>
                   </div>
                    <div class="col-lg-9">
                        <div class="main_menu menu_three header_position">
                            <nav>
                                <ul>

                                    <li class="active"><a  href="{{ route('dashboard_frontend.index') }}"><i class="zmdi zmdi-home"></i> home </i></a></li>
                                    <li class="mega_items"><a href="shop.html"><i class="zmdi zmdi-shopping-basket"></i> shop <i class="zmdi zmdi-caret-down"></i></a>
                                        <div class="mega_menu">
                                            <ul class="mega_menu_inner">
                                                <li><a href="#">Shop Layouts</a>
                                                    <ul>
                                                        <li><a href="shop-fullwidth.html">Full Width</a></li>
                                                        <li><a href="shop-fullwidth-list.html">Full Width list</a></li>
                                                        <li><a href="shop-right-sidebar.html">Right Sidebar </a></li>
                                                        <li><a href="shop-right-sidebar-list.html"> Right Sidebar list</a></li>
                                                        <li><a href="shop-list.html">List View</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">other Pages</a>
                                                    <ul>
                                                        <li><a href="{{ route('cart.shopping_cart') }}">cart</a></li>
                                                        <li><a href="wishlist.html">Wishlist</a></li>
                                                        <li><a href="checkout.html">Checkout</a></li>
                                                        <li><a href="my-account.html">my account</a></li>
                                                        <li><a href="404.html">Error 404</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Product Types</a>
                                                    <ul>
                                                        <li><a href="product-details.html">product details</a></li>
                                                        <li><a href="product-sidebar.html">product sidebar</a></li>
                                                        <li><a href="product-grouped.html">product grouped</a></li>
                                                        <li><a href="variable-product.html">product variable</a></li>

                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li><a href="about.html"><i class="zmdi zmdi-comments"></i> about Us</a></li>
                                    <li>
                                        @if(auth()->guard('customer')->check())
                                            @php
                                                $customer = auth()->guard('customer')->user();
                                                $itemsInCart = App\Models\Cart::where('customer_id', $customer->id)->get();
                                                $hargaTotal = 0;
                                                foreach ($itemsInCart as $item) {
                                                    $hargaFinal = $item->produk->harga_diskon ? $item->produk->harga_diskon : $item->produk->harga;
                                                    $hargaTotal += $hargaFinal * $item->quantity;
                                                }
                                            @endphp
                                            <div class="mini_cart_wrapper">
                                                <a href="javascript:void(0)"><i class="zmdi zmdi-shopping-basket"></i> <span style="color: white;">{{ $itemsInCart->count() }} items - Rp {{ number_format($hargaTotal, 2) }}</span> </a>
                                                <!--mini cart-->
                                                <div class="mini_cart">
                                                    @foreach ($itemsInCart as $item)
                                                        <div class="cart_item">
                                                            <div class="cart_img">
                                                                <a href="{{ route('produk.detail', $item->produk->slug) }}"><img src="{{ asset('storage/image_produk/' . $item->produk->image) }}" width="100"></a>
                                                            </div>
                                                            <div class="cart_info">
                                                                <a href="{{ route('produk.detail', $item->produk->slug) }}">{{ $item->produk->nama }}</a>
                                                                <span class="quantity">Qty: {{ $item->quantity }}</span>
                                                                @php
                                                                    $hargaFinal = $item->produk->harga_diskon ? $item->produk->harga_diskon : $item->produk->harga;
                                                                    $total = $hargaFinal * $item->quantity
                                                                @endphp
                                                                <span class="price_cart">Rp {{ number_format($total, 2) }}</span>

                                                            </div>
                                                            <div class="cart_remove">
                                                                <span class="remove-item-btn" data-item-id="{{ $item->id }}" data-url="{{ route('cart.removeFromCart', ['cartItem' => $item->id]) }}">
                                                                    <i class="ion-android-close"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <div class="mini_cart_table">
                                                        <div class="cart_total">
                                                            <span>Subtotal:</span>
                                                            <span class="price">Rp {{ number_format($hargaTotal, 2) }}</span>
                                                        </div>
                                                    </div>

                                                    <div class="mini_cart_footer">
                                                    <div class="cart_button">
                                                            <a href="{{ route('cart.shopping_cart') }}">View cart</a>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!--mini cart end-->
                                            </div>
                                        @else
                                            <a href="{{ route('customer.login') }}"><i class="zmdi zmdi-account"></i>  LOGIN</a>
                                        @endif
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header middel end-->

    </header>
    <!--header area end-->

    <!--Offcanvas menu area start-->

    <div class="off_canvars_overlay">

    </div>
    <div class="Offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <span>MENU</span>
                        <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                    </div>
                    <div class="Offcanvas_menu_wrapper">
                        <div class="canvas_close">
                              <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                        </div>
                        <div class="welcome_text">
                           <p>Welcome to <span>Electronics Store</span> </p>
                       </div>

                        <div class="top_right">
                            <ul>
                                @if(auth()->guard('customer')->check())
                                    <li class="top_links"><a href="#"><i class="zmdi zmdi-account"></i> My account <i class="zmdi zmdi-caret-down"></i></a>
                                        <ul class="dropdown_links">
                                            <li><a href="{{ route('customer.myAccount') }}">My Account </a></li>
                                            <li><a href="{{ route('cart.shopping_cart') }}">Shopping Cart</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="search-container">
                           <form action="#">
                               <div class="hover_category">
                                    <select class="select_option" name="select" id="categori2">
                                        <option selected value="1">All Categories</option>
                                        <option value="2">Accessories</option>
                                        <option value="3">Accessories & More</option>
                                        <option value="4">Butters & Eggs</option>
                                        <option value="5">Camera & Video </option>
                                        <option value="6">Mornitors</option>
                                        <option value="7">Tablets</option>
                                        <option value="8">Laptops</option>
                                        <option value="9">Handbags</option>
                                        <option value="10">Headphone & Speaker</option>
                                        <option value="11">Herbs & botanicals</option>
                                        <option value="12">Vegetables</option>
                                        <option value="13">Shop</option>
                                        <option value="14">Laptops & Desktops</option>
                                        <option value="15">Watchs</option>
                                        <option value="16">Electronic</option>
                                    </select>
                               </div>
                                <div class="search_box">
                                    <input placeholder="Search product..." type="text">
                                    <button type="submit"><i class="zmdi zmdi-search"></i></button>
                                </div>
                            </form>
                        </div>
                        @if(auth()->guard('customer')->check())
                            @php
                                $customer = auth()->guard('customer')->user();
                                $itemsInCart = App\Models\Cart::where('customer_id', $customer->id)->get();
                                $hargaTotal = 0;
                                foreach ($itemsInCart as $item) {
                                    $hargaFinal = $item->produk->harga_diskon ? $item->produk->harga_diskon : $item->produk->harga;
                                    $hargaTotal += $hargaFinal * $item->quantity;
                                }
                            @endphp
                            <div class="mini_cart_wrapper">
                                <a href="javascript:void(0)"><i class="zmdi zmdi-shopping-basket"></i> <span>{{ $itemsInCart->count() }} items - Rp {{ number_format($hargaTotal, 2) }}</span> </a>
                                <!--mini cart-->
                                <div class="mini_cart">
                                    @foreach ($itemsInCart as $item)
                                        <div class="cart_item">
                                            <div class="cart_img">
                                                <a href="{{ route('produk.detail', $item->produk->slug) }}"><img src="{{ asset('storage/image_produk/' . $item->produk->image) }}" width="100"></a>
                                            </div>
                                            <div class="cart_info">
                                                <a href="{{ route('produk.detail', $item->produk->slug) }}">{{ $item->produk->nama }}</a>
                                                <span class="quantity">Qty: {{ $item->quantity }}</span>
                                                @php
                                                    $hargaFinal = $item->produk->harga_diskon ? $item->produk->harga_diskon : $item->produk->harga;
                                                    $total = $hargaFinal * $item->quantity
                                                @endphp
                                                <span class="price_cart">Rp {{ number_format($total, 2) }}</span>

                                            </div>
                                            <div class="cart_remove">
                                                <span class="remove-item-btn" data-item-id="{{ $item->id }}" data-url="{{ route('cart.removeFromCart', ['cartItem' => $item->id]) }}">
                                                    <i class="ion-android-close"></i>
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="mini_cart_table">
                                        <div class="cart_total">
                                            <span>Subtotal:</span>
                                            <span class="price">Rp {{ number_format($hargaTotal, 2) }}</span>
                                        </div>
                                    </div>

                                    <div class="mini_cart_footer">
                                    <div class="cart_button">
                                            <a href="{{ route('cart.shopping_cart') }}">View cart</a>
                                        </div>
                                    </div>

                                </div>
                                <!--mini cart end-->
                            </div>
                        @endif
                        <div id="menu" class="text-left ">
                             <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active">
                                    <a href="#">Home</a>
                                    <ul class="sub-menu">
                                        <li><a href="index-2.html">Home 1</a></li>
                                        <li><a href="index-3.html">Home 2</a></li>
                                        <li><a href="index-4.html">Home 3</a></li>
                                        <li><a href="index-5.html">Home 4</a></li>
                                        <li><a href="index-6.html">Home 5</a></li>
                                        <li><a href="index-7.html">Home 6</a></li>
                                        <li><a href="index-8.html">Home 7</a></li>
                                        <li><a href="index-9.html">Home 8</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Shop</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children">
                                            <a href="#">Shop Layouts</a>
                                            <ul class="sub-menu">
                                                <li><a href="shop-fullwidth.html">Full Width</a></li>
                                                <li><a href="shop-fullwidth-list.html">Full Width list</a></li>
                                                <li><a href="shop-right-sidebar.html">Right Sidebar </a></li>
                                                <li><a href="shop-right-sidebar-list.html"> Right Sidebar list</a></li>
                                                <li><a href="shop-list.html">List View</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">other Pages</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{ route('cart.shopping_cart') }}">cart</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="my-account.html">my account</a></li>
                                                <li><a href="404.html">Error 404</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Product Types</a>
                                            <ul class="sub-menu">
                                                <li><a href="product-details.html">product details</a></li>
                                                <li><a href="product-sidebar.html">product sidebar</a></li>
                                                <li><a href="product-grouped.html">product grouped</a></li>
                                                <li><a href="variable-product.html">product variable</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">blog</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog.html">blog</a></li>
                                        <li><a href="blog-details.html">blog details</a></li>
                                        <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                        <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                    </ul>

                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">pages </a>
                                    <ul class="sub-menu">
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="services.html">services</a></li>
                                        <li><a href="portfolio.html">portfolio</a></li>
                                        <li><a href="faq.html">Frequently Questions</a></li>
                                        <li><a href="contact.html">contact</a></li>
                                        <li><a href="login.html">login</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="404.html">Error 404</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="about.html">about Us</a>
                                </li>
                                <li class="menu-item-has-children">

                                </li>
                                <li class="menu-item-has-children">
                                    @if(!auth()->guard('customer')->check())
                                        <a href="{{ route('customer.login') }}"> Login</a>
                                    @endif
                                </li>
                            </ul>
                        </div>

                        <div class="Offcanvas_footer">
                            <span><a href="#"><i class="fa fa-envelope-o"></i> info@yourdomain.com</a></span>
                            <ul>
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Offcanvas menu area end-->

    {{-- CONTENT --}}
          @yield('content')
    {{-- END CONTENT --}}

    <!--footer area start-->
    <footer class="footer_widgets footer_three">
        <div class="container">
            <div class="footer_top">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="widgets_container contact_us">
                            <a href="index-2.html"><img src="assets/img/logo/logo-2.png" alt=""></a>
                            <div class="footer_contact">
                                <ul>
                                    <li><i class="zmdi zmdi-home"></i><span>Addresss:</span> 2 Fauconberg Rd,Chiswick, London</li>
                                    <li><i class="zmdi zmdi-phone-setting"></i><span>Phone:</span><a href="tel:(+1) 866-540-3229">(+1) 866-540-3229</a> </li>
                                    <li><i class="zmdi zmdi-email"></i><span>Email:</span>  info@plazathemes.com</li>
                                </ul>
                            </div>
                             <div class="social_icone">
                                <ul>
                                    <li class="share"><a href="#" title="rss"><i class="fa fa-share-alt"></i></a>
                                        <div class="social_title">
                                            <p>Subscribe</p>
                                            <h3>Rss Feed</h3>
                                        </div>
                                    </li>
                                    <li class="twitter"><a href="#" title="twitter"><i class="fa fa-twitter"></i></a>
                                        <div class="social_title">
                                            <p>Follow Us</p>
                                            <h3>Twitter</h3>
                                        </div>
                                    </li>
                                    <li class="facebook"><a href="#" title="facebook"><i class="fa fa-facebook"></i></a>
                                        <div class="social_title">
                                            <p>Find Us</p>
                                            <h3>Facebook</h3>
                                        </div>
                                    </li>
                                    <li class="google_plus"><a href="#" title="google"><i class="fa fa-google-plus"></i></a>
                                        <div class="social_title">
                                            <p>Find Us</p>
                                            <h3>Google+</h3>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-7">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="widgets_container widget_menu">
                                    <h3>CUSTOMER SERVICE</h3>
                                    <div class="footer_menu">
                                        <ul>
                                            <li><a href="#">Shipping & Returns</a></li>
                                            <li><a href="#"> Secure Shopping</a></li>
                                            <li><a href="#">International Shipping</a></li>
                                            <li><a href="#"> Affiliates</a></li>
                                            <li><a href="contact.html"> Contact</a></li>
                                            <li><a href="#"> Travel</a></li>
                                            <li><a href="#">ecommerce</a></li>
                                            <li><a href="#"> Creative</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="widgets_container widget_menu">
                                    <h3>Information</h3>
                                    <div class="footer_menu">
                                        <ul>
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="#">Delivery infomation</a></li>
                                            <li><a href="#">Privacy Policy</a></li>
                                            <li><a href="#"> Travel</a></li>
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="#">Portfolio</a></li>
                                            <li><a href="#">Conditions</a></li>
                                            <li><a href="#"> Frequently Questions</a></li>

                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="widgets_container">
                            <h3>Latest Posts</h3>
                            <div class="Latest_Posts_wrapper">
                                <div class="single_Latest_Posts">
                                    <div class="Latest_Posts_thumb">
                                        <a href="blog-details.html"><img src="assets/img/category/post1.jpg" alt=""></a>
                                    </div>
                                    <div class="Latest_Posts_content">
                                        <h3><a href="blog-details.html">Blog image post</a></h3>
                                        <span><i class="zmdi zmdi-card-sd"></i> 10 August, 2021</span>
                                    </div>
                                </div>
                                <div class="single_Latest_Posts">
                                    <div class="Latest_Posts_thumb">
                                        <a href="blog-details.html"><img src="assets/img/category/post2.jpg" alt=""></a>
                                    </div>
                                    <div class="Latest_Posts_content">
                                        <h3><a href="blog-details.html">Post with Gallery</a></h3>
                                        <span><i class="zmdi zmdi-card-sd"></i> 10 August, 2021</span>
                                    </div>
                                </div>
                                <div class="single_Latest_Posts">
                                    <div class="Latest_Posts_thumb">
                                        <a href="blog-details.html"><img src="assets/img/category/post3.jpg" alt=""></a>
                                    </div>
                                    <div class="Latest_Posts_content">
                                        <h3><a href="blog-details.html">Post with Audio</a></h3>
                                        <span><i class="zmdi zmdi-card-sd"></i> 10 August, 2021</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer_tag">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer_tag_container">
                            <div class="footer_tag_menu">
                                <h3>Furniture :</h3>
                                <ul>
                                    <li><a href="#">bedroom</a></li>
                                    <li><a href="#">Livingroom</a></li>
                                    <li><a href="#">badroom</a></li>
                                    <li><a href="#">Sofa</a></li>
                                    <li><a href="#">Chair</a></li>
                                    <li><a href="#">Bed</a></li>
                                    <li><a href="#">Desk</a></li>
                                </ul>
                            </div>
                            <div class="footer_tag_menu">
                                <h3>Electronic :</h3>
                                <ul>
                                    <li><a href="#">Laptop</a></li>
                                    <li><a href="#">TV</a></li>
                                    <li><a href="#">Computer</a></li>
                                    <li><a href="#">Mobile</a></li>
                                    <li><a href="#">Tablet</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="footer_bottom">
            <div class="container">
               <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="copyright_area">
                            <p>Copyright &copy; 2023 All Right Reserved.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="footer_payment text-right">
                            <p><img src="assets/img/icon/payment.png" alt=""></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer area end-->


     <!-- modal area start-->
    <div class="modal fade" id="modal_box" tabindex="-1" role="dialog"  aria-hidden="true">
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
                                                <a href="#"><img src="assets/img/product/product37.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab2" role="tabpanel">
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
                                        </div>
                                    </div>
                                    <div class="modal_tab_button">
                                        <ul class="nav product_navactive owl-carousel" role="tablist">
                                            <li >
                                                <a class="nav-link active" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="assets/img/product/productbig1.jpg" alt=""></a>
                                            </li>
                                            <li>
                                                 <a class="nav-link" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><img src="assets/img/product/productbig2.jpg" alt=""></a>
                                            </li>
                                            <li>
                                               <a class="nav-link button_three" data-bs-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><img src="assets/img/product/productbig4.jpg" alt=""></a>
                                            </li>
                                            <li>
                                               <a class="nav-link" data-bs-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false"><img src="assets/img/product/productbig5.jpg" alt=""></a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <div class="modal_right">
                                    <div class="modal_title mb-10">
                                        <h2>Handbag feugiat</h2>
                                    </div>
                                    <div class="modal_price mb-10">
                                        <span class="new_price">$64.99</span>
                                        <span class="old_price" >$78.99</span>
                                    </div>
                                    <div class="modal_description mb-15">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam, rerum vel recusandae </p>
                                    </div>
                                    <div class="variants_selects">
                                        <div class="variants_size">
                                           <h2>size</h2>
                                           <select class="select_option">
                                               <option selected value="1">s</option>
                                               <option value="1">m</option>
                                               <option value="1">l</option>
                                               <option value="1">xl</option>
                                               <option value="1">xxl</option>
                                           </select>
                                        </div>
                                        <div class="variants_color">
                                           <h2>color</h2>
                                           <select class="select_option">
                                               <option selected value="1">purple</option>
                                               <option value="1">violet</option>
                                               <option value="1">black</option>
                                               <option value="1">pink</option>
                                               <option value="1">orange</option>
                                           </select>
                                        </div>
                                        <div class="modal_add_to_cart">
                                            <form action="#">
                                                <input min="0" max="100" step="2" value="1" type="number">
                                                <button type="submit">add to cart</button>
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

     <!-- modal area end-->



<!-- JS
============================================ -->

<!-- Plugins JS -->
<script src="{{ asset('frontend_assets/assets/js/plugins.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('frontend_assets/assets/js/main.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

{{-- REMOVE ITEM FROM CART --}}
<script>
    $(document).ready(function () {
        $('.remove-item-btn').click(function (e) {
            e.preventDefault(); // Prevent the default button behavior

            var url = $(this).data('url');

            // Send an AJAX request to delete the item without confirmation
            $.ajax({
                url: url,
                type: 'DELETE',
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}', // Add the CSRF token here
                },
                success: function (response) {
                    // Handle success, e.g., remove the item from the DOM
                    Swal.fire({
                        title: 'Berhasil',
                        text: response.message,
                        icon: 'success',
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function (xhr, status, error) {
                    // Handle errors, e.g., show an error message
                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred: ' + xhr.responseText,
                        icon: 'error',
                    });
                }
            });
        });
    });
</script>

@yield('additional_js')
</body>


<!-- Mirrored from htmldemo.net/pallas/pallas/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Aug 2023 13:10:37 GMT -->
</html>