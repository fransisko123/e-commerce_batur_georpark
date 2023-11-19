@extends('admin_layouts/master')

@section('title', 'Tambah Alamat')

@section('additional_css')
  <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center">
      <h4 class="fw-bold py-3">
        <span class="text-muted fw-light"><a href="{{ route('alamat_customer.index', $data_customer->id) }}">Alamat</a> /</span> Tambah Alamat
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
        <h5 class="mb-0">Form Tambah Alamat</h5>
      </div>
      <div class="card-body mt-3">
        <form action="{{ route('alamat_customer.store', $data_customer->id) }}" method="post">
          @csrf
          <div class="mb-3">
            <label for="provinsi" class="form-label">Provinsi</label>
            <select class="form-select" id="provinsi" name="provinsi" required>
              @foreach($daftarProvinsi as $provinsi)
                  <option value="{{ $provinsi['province_id'] }}">{{ $provinsi['province'] }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="kota" class="form-label">Kota</label>
            <select class="form-select" id="kota" name="kota" required>

            </select>
          </div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat spesifik</label>
            <textarea class="form-control" name="alamat_spesifik" id="alamat" rows="3">{{ old('alamat') }}</textarea>
          </div>
          <button type="submit" class="btn btn-primary mt-4">Simpan</button>
        </form>
      </div>
    </div>
@endsection

@section('additional_js')
  <script src="{{ asset('admin_assets/assets/js/form-layouts.js') }}"></script>
  <script>
    $(document).ready(function () {
        // Tangkap perubahan pada select input provinsi
        $('#provinsi').change(function () {
            var provinsiId = $(this).val(); // Ambil nilai province_id yang dipilih

            // Kirim permintaan Ajax untuk mendapatkan kota berdasarkan provinsi
            $.ajax({
                url: '/getCities/' + provinsiId, // Ganti URL dengan endpoint yang sesuai di Laravel
                type: 'GET',
                success: function (data) {
                    // Hapus opsi kota yang sudah ada
                    $('#kota').empty();

                    // Tambahkan opsi kota yang baru berdasarkan data yang diterima
                    $.each(data, function (key, value) {
                        $('#kota').append('<option value="' + value.city_id + '">' + value.city_name + '</option>');
                    });
                }
            });
        });
    });
  </script>
@endsection