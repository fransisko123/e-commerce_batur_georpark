@extends('admin_layouts/master')

@section('title', 'Customer')

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
        Customer</b>
      </h4>
    <a href="#" class="btn btn-primary">
      <span class="bx bx-plus-circle"></span>&nbsp; Tambah Customer
    </a>
  </div>
    <div class="d-flex justify-content-between align-items-center mb-2">
      <h4 class="fw-bold py-3 mb-4">
        Table Customer
      </h4>
    </div>
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded mb-4 card-datatable table-responsive pt-3">
      <div class="table-responsive datatables-basic table">
        <table class="table table-hover" id="test-table">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Email</th>
              <th>Tanggal Lahir</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($customers as $item)
              <tr>
                <td>{{ $item->nama_depan }} {{ $item->nama_belakang }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ Illuminate\Support\Carbon::parse($item->tanggal_lahir)->locale('id_ID')->isoFormat('D MMMM YYYY') }}</td>
                <td>
                  <a href="#" class="btn btn-primary">Edit</a>
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal" data-id="1" onclick="showConfirmationModal(this)">
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
            <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori Produk</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              </button>
          </div>
          <div class="modal-body">
            <p>Apakah anda yakin ingin menghapus kategori produk.</p>
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
    $('#delete-form').attr('action', '/kategori_produk/' + id);
  }

  function deleteData() {
    $('#delete-form').submit();
  }
</script>
<script>
  new DataTable('#test-table');
</script>
@endsection