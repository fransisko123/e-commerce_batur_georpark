@extends('admin_layouts/master')

@section('title', 'Payment')

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
        Payment
      </h4>
    {{-- <a href="{{ route('order.create') }}" class="btn btn-primary">
      <span class="bx bx-plus-circle"></span>&nbsp; Tambah Order
    </a> --}}
  </div>
    <div class="d-flex justify-content-between align-items-center mb-2">
      <h4 class="fw-bold py-3 mb-4">
        Table Payment
      </h4>
    </div>
    {{-- <form method="GET" action="{{ route('order.index') }}">
      <div class="form-group mb-3">
        <label for="start_date">Tanggal Awal:</label>
        <input type="date" name="start_date" id="start_date" class="form-control" required>
      </div>
      <div class="form-group mb-3">
        <label for="end_date">Tanggal Akhir:</label>
        <input type="date" name="end_date" id="end_date" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary mb-3">Cari</button>
    </form> --}}
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded mb-4 card-datatable table-responsive pt-3">
      <div class="table-responsive datatables-basic table">
        <table class="table table-hover" id="test-table">
          <thead>
            <tr>
              <th>Nomor Order</th>
              <th>Nama Customer</th>
              <th>Tanggal Payment</th>
              <th>Status Payment</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($payments as $item)
              <tr>
                <td>
                  <a href="{{ route('order.detail', $item->order->id) }}">{{ $item->order->no_order }}</a>
                </td>
                <td>{{ $item->order->customer->nama_depan }} {{ $item->order->customer->nama_belakang }}</td>
                <td>{{ Illuminate\Support\Carbon::parse($item->created_at)->locale('id_ID')->isoFormat('D MMMM YYYY') }}</td>
                <td>{{ $item->status }}</td>
                <td>
                  {{-- @if ($item->status == "pending")
                    <a href="#" class="btn btn-secondary m-1" onclick="event.preventDefault(); document.getElementById('form-payment-settled-{{$item->id}}').submit();">Settlement</a>
                    <form id="form-payment-settled-{{$item->id}}" action="{{ route('payment.settled_payment', [$item->payment_xendit_id, $item->external_id]) }}" method="POST" style="display: none;">
                        @csrf
                        @method('POST')
                    </form>
                  @endif --}}
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
            <h5 class="modal-title" id="exampleModalLabel">Hapus Payment</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              </button>
          </div>
          <div class="modal-body">
            <p>Apakah anda yakin ingin menghapus Payment.</p>
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
    $('#delete-form').attr('action', '/payment/' + id + '/delete');
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