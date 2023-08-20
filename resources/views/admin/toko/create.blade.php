@extends('admin_layouts/master')

@section('title', 'Tambah Toko')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
      <h4 class="fw-bold py-3">
        <span class="text-muted fw-light"><a href="{{ route('toko.index') }}">Toko</a> /</span> Buat Toko
      </h4>
    </div>

    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded mb-4">
      <h5 class="card-header">Form Buat Toko Baru</h5>
      <div class="card-body">
        <form action="{{ route('toko.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Toko</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Toko" required>
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Toko</label>
            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"></textarea>
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