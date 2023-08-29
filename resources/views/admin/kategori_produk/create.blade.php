@extends('admin_layouts/master')

@section('title', 'Tambah Kategori Produk')

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
      <h5 class="card-header">Form Tambah Kategori Produk Baru</h5>
      <div class="card-body">
        <form action="{{ route('kategori_produk.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Kategori Produk" value="{{ old('nama') }}" required>
          </div>
          <button type="submit" class="btn btn-primary mt-4">Simpan</button>
        </form>
      </div>
    </div>
@endsection