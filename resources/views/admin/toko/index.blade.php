@extends('admin_layouts/master')

@section('title', 'Toko')

@section('content')
    @if(session('status'))
    <div
      class="bs-toast toast fade show bg-success"
      role="alert"
      aria-live="assertive"
      aria-atomic="true"
    >
      <div class="toast-header">
        <i class="bx bx-bell me-2"></i>
        <div class="me-auto fw-semibold">Notifikasi</div>
        {{-- <small>11 mins ago</small> --}}
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        {{ session('status') }}
      </div>
    </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h4 class="fw-bold py-3 mb-4">
        Toko
      </h4>
      <a href="{{ route('toko.create') }}" class="btn btn-primary">
        <span class="bx bx-plus-circle"></span>&nbsp; Buat Toko
      </a>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
      @foreach ($toko as $item)
        <div class="col">
          <div class="card h-100">
            <img class="card-img-top" src="{{ asset('admin_assets/assets/img/elements/2.jpg') }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{ $item->nama }}</h5>
              <p class="card-text">{{ $item->deskripsi }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
@endsection

@section('additional_js')
  <script>
    var notificationStatus = "{{ session('status') }}";
  </script>
  <script src="{{ asset('admin_assets/assets/js/ui-toasts.js') }}"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        if (notificationStatus) {
            Toastify({
                text: notificationStatus,
                duration: 2000,
                gravity: "top",
                position: "right",
                backgroundColor: "green",
                stopOnFocus: true,
                onClick: function(){}
            }).showToast();
        }
    });
  </script>
@endsection