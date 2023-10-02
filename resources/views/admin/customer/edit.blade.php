@extends('admin_layouts/master')

@section('title', 'Edit Customer')

@section('additional_css')
  <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center">
      <h4 class="fw-bold py-3">
        <span class="text-muted fw-light"><a href="{{ route('customer.index') }}">Customer</a> /</span> Edit Customer
      </h4>
    </div>

    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible" role="alert">
          {{ $error }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
          </button>
        </div>
      @endforeach
    @endif

    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded mb-4">
      <div class="card-header d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Form Edit Customer</h5>
      </div>
      <div class="card-body mt-3">
        <form action="{{ route('customer.update', $data_customer->id) }}" method="post">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="nama_depan" class="form-label">Nama Depan</label>
            <input type="text" class="form-control" name="nama_depan" id="nama_depan" placeholder="Masukan Nama Depan" value="{{ $data_customer->nama_depan }}" required>
          </div>
          <div class="mb-3">
            <label for="nama_belakang" class="form-label">Nama Belakang</label>
            <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" placeholder="Masukan Nama Belakang" value="{{ $data_customer->nama_belakang }}" required>
          </div>
          <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukan Tanggal Lahir" value="{{ $data_customer->tanggal_lahir }}" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email" value="{{ $data_customer->email }}" required>
          </div>
          <div class="mb-3">
            <label for="no_telp" class="form-label">Nomor Telepon</label>
            <input type="number" class="form-control" name="no_telp" id="no_telp" placeholder="Masukan Nomor Telepon" value="{{ $data_customer->no_telp }}" required>
          </div>
          {{-- <hr>
          <h4>Password</h4>
          <div class="mb-3">
            <label for="password" class="form-label">Password Baru (Kosongkan jika tidak ingin mengubah)</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
          </div>
          <div class="mb-3">
              <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
              <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Masukkan Password">
          </div> --}}
          <button type="submit" class="btn btn-primary mt-4">Simpan</button>
        </form>
      </div>
    </div>
@endsection

@section('additional_js')
  <script src="{{ asset('admin_assets/assets/vendor/libs/select2/select2.js') }}"></script>
  <script src="{{ asset('admin_assets/assets/js/form-layouts.js') }}"></script>
@endsection