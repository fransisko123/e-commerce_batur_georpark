<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="index.html" class="app-brand-link">
      <span class="app-brand-logo demo">

      </span>
      <span class="app-brand-text demo menu-text fw-bolder" style="text-transform: none !important;">Batur Geopark</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item {{ (request()->is('dashboard')) ? 'active' : '' }}">
      <a href="{{ route('dashboard.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>
    <li class="menu-item {{ (request()->is('toko')) ? 'active' : '' }}">
      <a href="{{ route('toko.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-store"></i>
        <div data-i18n="Analytics">Toko</div>
      </a>
    </li>
    @if(auth()->user()->role == 'admin')
      <li class="menu-item {{ (request()->is('kategori_produk')) ? 'active' : '' }}">
        <a href="{{ route('kategori_produk.index') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-store"></i>
          <div data-i18n="Analytics">Kategori Produk</div>
        </a>
      </li>
    @endif
    @if(auth()->user()->role == 'admin')
      <li class="menu-item {{ (request()->is('customer')) ? 'active' : '' }}">
        <a href="{{ route('customer.index') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-store"></i>
          <div data-i18n="Analytics">Customer</div>
        </a>
      </li>
    @endif
    @if(auth()->user()->role == 'admin')
      <li class="menu-item {{ (request()->is('order')) ? 'active' : '' }}">
        <a href="{{ route('order.index') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-store"></i>
          <div data-i18n="Analytics">Order</div>
        </a>
      </li>
    @endif
    @if(auth()->user()->role == 'pemilik_toko')
    @php
        $toko = App\Models\Toko::where('user_id', auth()->user()->id)->first();
    @endphp
      <li class="menu-item {{ (request()->is('produk_on_order')) ? 'active' : '' }}">
        <a href="{{ route('produk_on_order.index', $toko->id) }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-store"></i>
          <div data-i18n="Analytics">Laporan Penjualan</div>
        </a>
      </li>
    @endif
  </ul>
</aside>