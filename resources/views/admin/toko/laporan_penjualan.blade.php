@extends('admin_layouts/master')

@section('title', 'Laporan Penjualan')

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
        <span class="text-muted fw-light"><a href="{{ route('toko.index') }}">Toko</a> /</span> Laporan Penjualan
      </h4>
    {{-- <a href="{{ route('order.create') }}" class="btn btn-primary">
      <span class="bx bx-plus-circle"></span>&nbsp; Tambah Order
    </a> --}}
  </div>
    <div class="d-flex justify-content-between align-items-center mb-2">
      <h4 class="fw-bold py-3 mb-4">
        Table Laporan Penjualan Barang
      </h4>
    </div>
    <form method="GET" action="{{ route('produk_on_order.index', $toko->id) }}">
      <div class="form-group mb-3">
        <label for="start_date">Tanggal Awal:</label>
        <input type="date" name="start_date" id="start_date" class="form-control">
      </div>
      <div class="form-group mb-3">
        <label for="end_date">Tanggal Akhir:</label>
        <input type="date" name="end_date" id="end_date" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary mb-3">Cari</button>
    </form>
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded mb-4 card-datatable table-responsive pt-3">
      <div class="table-responsive datatables-basic table">
        <table class="table table-hover" id="test-table">
          <thead>
            <tr>
              <th>Image</th>
              <th>Nomor Order</th>
              <th>Tanggal Order</th>
              <th>Nama Pembeli</th>
              <th>Nama Barang</th>
              <th>Quantity</th>
              <th>Total Harga</th>
            </tr>
          </thead>
          <tbody>
            @php
                $totalHargaSemuaProduk = 0; // Inisialisasi total harga
            @endphp
            @foreach ($produkInOrder as $item)
              <tr>
                <td><img src="{{ asset('storage/image_produk/' . $item->produk->image) }}" width="100"></td>
                <td>{{ $item->order_id }}</td>
                <td>{{ Illuminate\Support\Carbon::parse($item->order->created_at)->locale('id_ID')->isoFormat('D MMMM YYYY') }}</td>
                <td>{{ $item->order->customer->nama_depan }} {{ $item->order->customer->nama_belakang }}</td>
                <td>{{ $item->produk->nama }}</td>
                <td>x{{ $item->quantity }}</td>
                @php
                    $harga_produk = $item->produk->harga_diskon ? $item->produk->harga_diskon : $item->produk->harga;
                    $hargaTotalProduk = $harga_produk * $item->quantity;
                    $totalHargaSemuaProduk += $hargaTotalProduk;
                @endphp
                <td>Rp {{ number_format($hargaTotalProduk, 2) }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <br>
        <hr>
        <h3>Total Pendapatan : <b>Rp {{ number_format($totalHargaSemuaProduk, 2) }}</b></h3>
      </div>
    </div>
@endsection

@section('additional_js')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
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