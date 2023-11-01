@extends('admin_layouts/master')

@section('title', 'Order')

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
        Order
      </h4>
    {{-- <a href="{{ route('order.create') }}" class="btn btn-primary">
      <span class="bx bx-plus-circle"></span>&nbsp; Tambah Order
    </a> --}}
  </div>
    <div class="d-flex justify-content-between align-items-center mb-2">
      <h4 class="fw-bold py-3 mb-4">
        Table Order
      </h4>
    </div>
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded mb-4 card-datatable table-responsive pt-3">
      <div class="table-responsive datatables-basic table">
        <table class="table table-hover" id="test-table">
          <thead>
            <tr>
              <th>Nomor Order</th>
              <th>Nama Pembeli</th>
              <th>Tanggal Order</th>
              <th>Total Harga</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $item)
              <tr>
                <td>{{ $item->no_order }}</td>
                <td>{{ $item->customer->nama_depan }} {{ $item->customer->nama_belakang }}</td>
                <td>{{ Illuminate\Support\Carbon::parse($item->created_at)->locale('id_ID')->isoFormat('D MMMM YYYY') }}</td>
                <td>Rp {{ number_format($item->total_harga, 2) }}</td>
                <td>{{ $item->status }}</td>
                <td>
                  <a href="{{ route('order.detail', $item->id) }}" class="btn btn-info">Detail</a>
                  @if ($item->status == "Pemesanan")
                    <a href="#" class="btn btn-secondary m-1" onclick="event.preventDefault(); document.getElementById('form-order-dikirim-{{$item->id}}').submit();">Kirim</a>
                    <form id="form-order-dikirim-{{$item->id}}" action="{{ route('order.dikirim', $item->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('PUT')
                    </form>
                  @endif
                  @if ($item->status == "Sedang Di Kirim")
                    <a href="#" class="btn btn-success m-1" onclick="event.preventDefault(); document.getElementById('form-order-dikirim-{{$item->id}}').submit();">Selesai</a>
                    <form id="form-order-dikirim-{{$item->id}}" action="{{ route('order.selesai', $item->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('PUT')
                    </form>
                  @endif
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