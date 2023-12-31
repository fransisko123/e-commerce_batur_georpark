@extends('frontend_layouts/master')

@section('title', 'My Account')

@section('additional_css')

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
                          <li>My account</li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--breadcrumbs area end-->

  <!-- my account start  -->
  <section class="main_content_area">
      <div class="container">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-end mb-4">
          <form action="{{ route('customer.logout') }}" method="POST">
            @csrf
            <button class="btn btn-outline-danger" >Logout</button>
          </form>
        </div>
          <div class="account_dashboard">
              <div class="row">
                  <div class="col-sm-12 col-md-3 col-lg-3">
                      <!-- Nav tabs -->
                      <div class="dashboard_tab_button">
                          <ul role="tablist" class="nav flex-column dashboard-list">
                              <li><a href="#dashboard" data-bs-toggle="tab" class="nav-link active">Dashboard</a></li>
                              <li> <a href="#orders" data-bs-toggle="tab" class="nav-link">Orders</a></li>
                              {{-- <li><a href="#downloads" data-bs-toggle="tab" class="nav-link">Downloads</a></li> --}}
                              <li><a href="#address" data-bs-toggle="tab" class="nav-link">Alamat</a></li>
                              <li><a href="#account-details" data-bs-toggle="tab" class="nav-link">Detail Akun</a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-sm-12 col-md-9 col-lg-9">
                      <!-- Tab panes -->
                      <div class="tab-content dashboard_content">
                          <div class="tab-pane fade show active" id="dashboard">
                              <h3>Dashboard </h3>
                              <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">Edit your password and account details.</a></p>
                          </div>
                          <div class="tab-pane fade" id="orders">
                              <h3>Orders</h3>
                              <div class="table-responsive">
                                  <table class="table">
                                      <thead>
                                          <tr>
                                              <th>No Order</th>
                                              <th>Date</th>
                                              <th>Status</th>
                                              <th>Total</th>
                                              <th>Actions</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($order as $item)
                                            <tr>
                                                <td>{{ $item->no_order }}</td>
                                                <td>{{ Illuminate\Support\Carbon::parse($item->created_at)->locale('id_ID')->isoFormat('D MMMM YYYY') }}</td>
                                                <td><span class="success">{{ $item->status }}</span></td>
                                                <td>Rp {{ number_format($item->total_harga, 2) }}</td>
                                                <td><a href="{{ route('customer.detail_order', [$item->customer_id, $item->id]) }}" class="view">Detail</a></td>
                                            </tr>
                                        @endforeach
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                          {{-- <div class="tab-pane fade" id="downloads">
                              <h3>Downloads</h3>
                              <div class="table-responsive">
                                  <table class="table">
                                      <thead>
                                          <tr>
                                              <th>Product</th>
                                              <th>Downloads</th>
                                              <th>Expires</th>
                                              <th>Download</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <td>Shopnovilla - Free Real Estate PSD Template</td>
                                              <td>May 10, 2018</td>
                                              <td><span class="danger">Expired</span></td>
                                              <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                          </tr>
                                          <tr>
                                              <td>Organic - ecommerce html template</td>
                                              <td>Sep 11, 2018</td>
                                              <td>Never</td>
                                              <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>
                          </div> --}}
                          <div class="tab-pane" id="address">
                             {{-- <p>The following addresses will be used on the checkout page by default.</p> --}}
                             <div class="row mb-3 justify-content-between">
                                <div class="col-md-6">
                                    <h4 class="billing-address">Billing address</h4>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    <a href="{{ route('alamat_frontend.create', $customer->id) }}" class="btn btn-success" style="color: white;">Tambah Alamat</a>
                                </div>
                              </div>
                              @foreach ($alamats as $item)
                                <div class="col">
                                    <div class="card h-100 mb-3">
                                    {{-- <img class="card-img-top" src="{{ asset('storage/image_toko/' . $item->image) }}" alt="Card image cap"> --}}
                                    <div class="card-body">
                                        <p class="card-text">{{ $item->province }}</p>
                                        <p class="card-text">{{ $item->city_name }} ({{ $item->type }})</p>
                                        <p class="card-text">{{ $item->postal_code }}</p>
                                        <p class="card-text">{{ $item->alamat_spesifik }}</p>
                                        {{-- <a href="#" class="btn btn-primary" style="color: white;">Edit</a> --}}
                                        {{-- <button class="btn btn-outline-danger" data-id="{{ $item->id }}" onclick="showConfirmationModal(this)"> --}}
                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapusModal" data-id="{{ $item->id }}" onclick="showConfirmationModal(this)">
                                        Hapus
                                        </button>
                                        <form id="delete-form" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                        </form>
                                    </div>
                                    </div>
                                </div>
                              @endforeach
                          </div>

                          {{-- MODAL HAPUS --}}
                            <div class="modal fade" id="hapusModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus alamat</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <p>Apakah anda yakin ingin menghapus alamat.</p>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger" onclick="deleteData()">Hapus</button>
                                    </div>
                                </div>
                                </div>
                            </div>

                          <div class="tab-pane fade" id="account-details">
                              <h3>Account details </h3>
                              <div class="login">
                                  <div class="login_form_container">
                                      <div class="account_login_form">
                                          <form action="{{ route('customerFrontend.editProfileProses', $customer->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                              {{-- <p>Already have an account? <a href="#">Log in instead!</a></p> --}}
                                                <label>Nama Depan</label>
                                                <input type="text" name="nama_depan" value="{{ $customer->nama_depan }}">
                                                <label>Nama Belakang</label>
                                                <input type="text" name="nama_belakang" value="{{ $customer->nama_belakang }}">
                                                {{-- <label>Email</label>
                                                <input type="email" name="email" value="{{ $customer->email }}"> --}}
                                                <label>No Telp</label>
                                                <input type="text" name="no_telp" value="{{ $customer->no_telp }}">
                                                <label>Birthdate</label>
                                                <input type="date" value="{{ $customer->tanggal_lahir }}" name="tanggal_lahir">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- my account end   -->
@endsection

@section('additional_js')
<script>
    function showConfirmationModal(button) {
      var id = $(button).data('id');
      $('#delete-confirmation-modal').modal('show');
      $('#delete-form').attr('action', '/destroy/alamat_frontend/' + id);
    }

    function deleteData() {
      $('#delete-form').submit();
    }
  </script>
@endsection