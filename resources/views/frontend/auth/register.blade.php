@extends('frontend_layouts/master')

@section('title', 'Register')

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
                      <li>Register</li>
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
            <div class="account_form register">
                <h2>Register</h2>
                <form action="{{ route('customer.post_register') }}" method="POST">
                  @csrf
                  <p>
                    <label>Nama  <span>*</span></label>
                    <input type="text" name="nama">
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </p>
                    <p>
                        <label>Email address  <span>*</span></label>
                        <input type="email" name="email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </p>
                    <p>
                        <label>Passwords <span>*</span></label>
                        <input type="password" name="password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </p>
                    <p>
                      <label>Confirm Password <span>*</span></label>
                      <input type="password" name="password_confirmation">
                      @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </p>
                    <div class="login_submit">
                        <button type="submit">Register</button>
                    </div>
                </form>
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