@extends('admin_layouts/master')

@section('title', 'List Produk')

@section('additional_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('admin_assets/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
@endsection

@section('content')
  <div class="d-flex justify-content-between align-items-center">
    <h4 class="fw-bold py-3">
      <span class="text-muted fw-light"><a href="{{ route('toko.index') }}">Toko</a> /</span> List Produk
    </h4>
  </div>

    @if(session('status'))
      <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
      </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw py-3 mb-4">
          List Produk Pada <b>{{ $toko->nama }}</b>
        </h4>
      <a href="#" class="btn btn-primary">
        <span class="bx bx-plus-circle"></span>&nbsp; Tambah Produk
      </a>
    </div>
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded mb-4 card-datatable table-responsive pt-3">
      <div class="table-responsive datatables-basic table border-top">
        <table class="table table-hover" id="test-table">
          <thead>
            <tr>
              <th>Nama Produk</th>
              <th>Deskripsi Produk</th>
              <th>Harga Produk</th>
              <th>Stok</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>test</td>
              <td>test</td>
              <td>test</td>
              <td>test</td>
              <td>test</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    {{-- MODAL HAPUS --}}
    <div class="modal fade" id="hapusModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hapus Toko</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              </button>
          </div>
          <div class="modal-body">
            <p>Apakah anda yakin ingin menghapus toko.</p>
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
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('admin_assets/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}"></script>
<script src="{{ asset('admin_assets/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('admin_assets/assets/js/docs.js') }}"></script>
<script src="{{ asset('admin_assets/assets/js/docs-tables-datatables.js') }}"></script>
<script>
  function showConfirmationModal(button) {
    var id = $(button).data('id');
    $('#delete-confirmation-modal').modal('show');
    $('#delete-form').attr('action', '/toko/' + id);
  }

  function deleteData() {
    $('#delete-form').submit();
  }
</script>
<script>
  new DataTable('#test-table');
</script>
@endsection