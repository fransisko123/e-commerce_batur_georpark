@extends('admin_layouts/master')

@section('title', 'Tambah Produk')

@section('additional_css')
  <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center">
      <h4 class="fw-bold py-3">
        <span class="text-muted fw-light"><a href="{{ route('toko.index') }}">List Toko</a> / <a href="{{ route('produk.index', $toko->id) }}">List Produk</a> /</span> Buat Produk
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
        <h5 class="mb-0">Form Tambah Produk</h5>
      </div>
      <div class="card-body mt-3">
        <form action="{{ route('produk.store', $toko->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="pemilik_toko" class="form-label">Kategori Produk</label>
            <select class="form-select" name="kategori_produk" id="kategori_produk" required>
                @foreach ($kategori_produks as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Produk" value="{{ old('nama') }}" required>
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Produk</label>
            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga Produk</label>
            <input type="number" class="form-control" name="harga" id="harga" value="{{ old('harga') }}" placeholder="Masukan Harga Produk" required>
          </div>
          <div class="mb-3">
            <label for="harga_diskon" class="form-label">Harga Produk Diskon (Opsional)</label>
            <input type="number" class="form-control" name="harga_diskon" id="harga_diskon" value="{{ old('harga_diskon') }}" placeholder="Masukan Harga Produk Diskon">
          </div>
          <div class="mb-3">
            <label for="stok" class="form-label">Stok Produk</label>
            <input type="number" class="form-control" name="stok" id="stok" value="{{ old('stok') }}" placeholder="Masukan Stok Produk" required>
          </div>
          <div class="mb-3">
            <label for="berat" class="form-label">Berat Produk (Gram)</label>
            <input type="number" class="form-control" name="berat" id="berat" value="{{ old('berat') }}" placeholder="Masukan berat dalam gram" required>
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