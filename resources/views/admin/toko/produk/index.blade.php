@extends('admin_layouts/master')

@section('title', 'List Produk')

@section('additional_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
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
      <a href="{{ route('produk.create', $toko->id) }}" class="btn btn-primary">
        <span class="bx bx-plus-circle"></span>&nbsp; Tambah Produk
      </a>
    </div>
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded mb-4 card-datatable table-responsive pt-3">
      <div class="table-responsive datatables-basic table">
        <table class="table table-hover" id="test-table">
          <thead>
            <tr>
              <th>Nama Produk</th>
              <th>Kategori Produk</th>
              <th>Deskripsi Produk</th>
              <th>Harga Produk</th>
              <th>Harga Produk Diskon</th>
              <th>Stok</th>
              <th>Image</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($toko->produks as $item)
              <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->kategori_produk->nama }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>Rp.{{ number_format($item->harga, 2, ',', '.') }}</td>
                <td>Rp.{{ number_format($item->harga_diskon, 2, ',', '.') }}</td>
                <td>{{ $item->stok }}</td>
                <td><img src="{{ asset('storage/image_produk/' . $item->image) }}" width="100"></td>
                <td>
                  <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-sm btn-icon item-edit"><i class="bx bxs-edit" onMouseOver="this.style.color='blue'" onMouseOut="this.style.color='grey'"></i></a>
                  <span style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#hapusModal" data-id="{{ $item->id }}" onclick="showConfirmationModal(this)">
                    <i class="bx bxs-trash" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='grey'"></i>
                  </span>
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
            <h5 class="modal-title" id="exampleModalLabel">Hapus Produk</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              </button>
          </div>
          <div class="modal-body">
            <p>Apakah anda yakin ingin menghapus produk.</p>
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
    $('#delete-form').attr('action', '/produk/' + id + "/delete");
  }

  function deleteData() {
    $('#delete-form').submit();
  }
</script>
<script>
  new DataTable('#test-table');
</script>
@endsection