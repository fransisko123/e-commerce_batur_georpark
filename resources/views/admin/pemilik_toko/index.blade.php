@extends('admin_layouts/master')

@section('title', 'Pemilik Toko')

@section('additional_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('content')
    @if(session('status'))
      <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
      </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h4 class="fw py-3 mb-4">
        Pemilik Toko
      </h4>
      <a href="{{ route('pemilik_toko.create') }}" class="btn btn-primary">
        <span class="bx bx-plus-circle"></span>&nbsp; Tambah Pemilik Toko
      </a>
  </div>
    <div class="d-flex justify-content-between align-items-center mb-2">
      <h4 class="fw-bold py-3 mb-4">
        Table Pemilik Toko
      </h4>
    </div>
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded mb-4 card-datatable table-responsive pt-3">
      <div class="table-responsive datatables-basic table">
        <table class="table table-hover" id="test-table">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pemilik_toko as $item)
              <tr>
                <td>{{ $item->name}}</td>
                <td>{{ $item->email }}</td>
                <td>
                  <a href="{{ route('pemilik_toko.edit', $item->id) }}" class="btn btn-primary" >Edit</a>
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal" data-id="{{ $item->id }}" onclick="showConfirmationModal(this)">
                    Hapus
                  </button>
                  <form id="delete-form" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    {{-- MODAL HAPUS --}}
    <div class="modal fade" id="hapusModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hapus Pemilik Toko</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              </button>
          </div>
          <div class="modal-body">
            <p>Apakah anda yakin ingin menghapus Pemilik Toko.</p>
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
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
  function showConfirmationModal(button) {
    var id = $(button).data('id');
    $('#delete-confirmation-modal').modal('show');
    $('#delete-form').attr('action', '/pemilik_toko/' + id);
  }

  function deleteData() {
    $('#delete-form').submit();
  }
</script>
<script>
  $(document).ready(function() {
      $('#test-table').DataTable({
          "paging": true, // Enable pagination
          "searching": true, // Enable searching
          "ordering": false, // Enable sorting
          "info": true, // Show table information
          "lengthChange": true, // Show entries per page change option
          "autoWidth": true, // Auto-adjust table width
      });
  });
</script>
@endsection