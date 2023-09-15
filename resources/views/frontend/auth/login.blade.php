@extends('frontend_layouts/master')

@section('title', 'Login')

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
                      <li>login</li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
</div>
<!--breadcrumbs area end-->


<!-- customer login start -->
<div class="customer_login mt-60">
  <div class="container">
      <div class="d-flex justify-content-center">
         <!--login area start-->
          <div class="col-lg-6 col-md-6">
              <div class="account_form">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                  <h2>login</h2>
                  <form action="{{ route('customer.post_login') }}" method="POST">
                    @csrf
                      <p>
                          <label>Email <span>*</span></label>
                          <input type="text" name="email" placeholder="Email" required>
                          @error('email')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                       </p>
                       <p>
                          <label>Passwords <span>*</span></label>
                          <input type="password" name="password" placeholder="Password" required>
                       </p>
                      <div class="login_submit">
                         <a href="#">Lost your password?</a>
                          <label for="remember">
                              <input id="remember" type="checkbox">
                              Remember me
                          </label>
                          <button type="submit">login</button>
                      </div>
                  </form>
                  <br>
                  <a href="{{ route('customer.register') }}">Belum punya akun? Registrasi Sekarang</a>
               </div>
          </div>
          <!--login area start-->

      </div>
  </div>
</div>
<!-- customer login end -->
@endsection

@section('additional_js')

@endsection