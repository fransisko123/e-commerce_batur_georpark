@extends('admin_layouts/master')

@section('title', 'Edit Toko')

@section('additional_css')
  <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center">
      <h4 class="fw-bold py-3">
        <span class="text-muted fw-light"><a href="{{ route('toko.index') }}">Toko</a> /</span> Edit Toko
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
      <h5 class="card-header">Form Edit Toko</h5>
      <div class="card-body">
        <form action="{{ route('toko.update', $toko->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="pemilik_toko" class="form-label">Pemilik Toko</label>
            <select class="form-control" name="pemilik_toko" id="pemilik_toko" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $toko->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Toko</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Toko" value="{{ old('nama', $toko->nama) }}" required>
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Toko</label>
            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3">{{ old('deskripsi', $toko->deskripsi) }}</textarea>
          </div>
          <img src="{{ asset('storage/image_toko/' . $toko->image) }}" width="180" class="rounded mb-3">
          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" name="image" id="image">
          </div>
          <button type="submit" class="btn btn-primary mt-4">Simpan Perubahan</button>
        </form>
      </div>
    </div>
@endsection
