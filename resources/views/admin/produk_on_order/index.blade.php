@extends('admin_layouts/master')

@section('title', 'Produk On Order')

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
        <h1>Hello</h1>
      </div>
    </div>
@endsection

@section('additional_js')

@endsection