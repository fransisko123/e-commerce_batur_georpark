@extends('frontend_layouts/master')

@section('title', 'Tambah Alamat')

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
                          <li>Tambah Alamat</li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--breadcrumbs area end-->

  <!-- my account start  -->
  <section class="main_content_area">
      <div class="container">
          <div class="account_dashboard">
              <div class="row">
                  <div class="col-sm-12 col-md-9 col-lg-9">
                    <h3>Tambah Alamat </h3>
                    <div class="login">
                        <div class="login_form_container">
                            <div class="account_login_form">
                              <form action="{{ route('alamat_frontend.store', $data_customer->id) }}" method="post">
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
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- my account end   -->
@endsection

@section('additional_js')
<script>
  $(document).ready(function () {
      // Tangkap perubahan pada select input provinsi
      $('#provinsi').change(function () {
          var provinsiId = $(this).val(); // Ambil nilai province_id yang dipilih

          // Kirim permintaan Ajax untuk mendapatkan kota berdasarkan provinsi
          $.ajax({
              url: '/getCitiesFrontend/' + provinsiId, // Ganti URL dengan endpoint yang sesuai di Laravel
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