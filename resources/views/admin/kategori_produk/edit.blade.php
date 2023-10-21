@extends('admin_layouts/master')

@section('title', 'Edit Kategori Produk')

@section('additional_css')
  <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center">
      <h4 class="fw-bold py-3">
        <span class="text-muted fw-light"><a href="{{ route('kategori_produk.index') }}">Kategori Produk</a> /</span> Edit Kategori Produk
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
        <h5 class="mb-0">Form Edit Kategori Produk</h5>
      </div>
      <div class="card-body mt-3">
        <form action="{{ route('kategori_produk.update', $kategori_produk->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Kategori Produk" value="{{ old('nama', $kategori_produk->nama) }}" required>
          </div>
          <img src="{{ asset('storage/image_kategori_produk/' . $kategori_produk->image) }}" width="120" class="rounded mb-3">
          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" name="image" id="image">
          </div>
          <button type="submit" class="btn btn-primary mt-4">Simpan Perubahan</button>
        </form>
      </div>
    </div>
@endsection

@section('additional_js')
  <script src="{{ asset('admin_assets/assets/vendor/libs/select2/select2.js') }}"></script>
  <script src="{{ asset('admin_assets/assets/js/form-layouts.js') }}"></script>
@endsection