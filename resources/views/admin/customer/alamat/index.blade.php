@extends('admin_layouts/master')

@section('title', 'Alamat')

@section('content')
    @if(session('status'))
      <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
      </div>
    @endif
    <div class="d-flex justify-content-between align-items-center">
      <h4 class="fw-bold py-3">
        <span class="text-muted fw-light"><a href="{{ route('customer.index') }}">Customer</a> /</span> Alamat
      </h4>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h4 class="fw-bold py-3 mb-4">
        Alamat
      </h4>
      <a href="{{ route('alamat_customer.create', $data_customer->id) }}" class="btn btn-primary">
        <span class="bx bx-plus-circle"></span>&nbsp; Tambah Alamat
      </a>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
      @foreach ($alamat as $item)
        <div class="col">
          <div class="card h-100">
            {{-- <img class="card-img-top" src="{{ asset('storage/image_toko/' . $item->image) }}" alt="Card image cap"> --}}
            <div class="card-body">
              <p class="card-text">{{ $item->province }}</p>
              <p class="card-text">{{ $item->city_name }} ({{ $item->type }})</p>
              <p class="card-text">{{ $item->postal_code }}</p>
              <p class="card-text">{{ $item->alamat_spesifik }}</p>
              {{-- <a href="#" class="btn btn-outline-primary">Edit</a> --}}
              {{-- <button class="btn btn-outline-danger" data-id="{{ $item->id }}" onclick="showConfirmationModal(this)"> --}}
              <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapusModal" data-id="{{ $item->id }}" onclick="showConfirmationModal(this)">
                Hapus
              </button>
              <form id="delete-form" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
              </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    {{-- MODAL HAPUS --}}
    <div class="modal fade" id="hapusModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hapus alamat</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              </button>
          </div>
          <div class="modal-body">
            <p>Apakah anda yakin ingin menghapus alamat.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger" onclick="deleteData()">Hapus</button>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('additional_js')
<script src="{{ asset('admin_assets/assets/js/ui-modals.js') }}"></script>
<script>
  function showConfirmationModal(button) {
    var id = $(button).data('id');
    $('#delete-confirmation-modal').modal('show');
    $('#delete-form').attr('action', '/destroy/alamat/' + id);
  }

  function deleteData() {
    $('#delete-form').submit();
  }
</script>
@endsection