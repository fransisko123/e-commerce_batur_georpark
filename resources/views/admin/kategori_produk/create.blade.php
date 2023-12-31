@extends('admin_layouts/master')

@section('title', 'Tambah Kategori Produk')

@section('additional_css')
  <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center">
      <h4 class="fw-bold py-3">
        <span class="text-muted fw-light"><a href="{{ route('kategori_produk.index') }}">Kategori Produk</a> /</span> Tambah Kategori Produk
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
        <h5 class="mb-0">Form Tambah Kategori Produk</h5>
      </div>
      <div class="card-body mt-3">
        <form action="{{ route('kategori_produk.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Kategori Produk" value="{{ old('nama') }}" required>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" name="image" id="image" required>
          </div>
          <button type="submit" class="btn btn-primary mt-4">Simpan</button>
        </form>
      </div>
    </div>
@endsection

@section('additional_js')
  <script src="{{ asset('admin_assets/assets/vendor/libs/select2/select2.js') }}"></script>
  <script src="{{ asset('admin_assets/assets/js/form-layouts.js') }}"></script>
@endsection