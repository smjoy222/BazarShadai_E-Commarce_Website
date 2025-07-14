@extends('admin.base')

@push('styles')
<title>Admin Products</title>
@endpush
@section('content')

<div>
  @include('admin.navbar.navbar')
  <div class="p-6 bg-zinc-100 min-h-[calc(100vh_-_72px)]">
    <h1 class="text-3xl font-bold mb-6">Products</h1>

    <table class="w-full" id="product-table">
      <thead>
        <tr class="bg-gray-200 text-gray-700">
          <th class="px-4 py-2">ID</th>
          <th class="px-4 py-2">Name</th>
          <th class="px-4 py-2">Price</th>
          <th class="px-4 py-2">Category</th>
          <th class="px-4 py-2">Image</th>
          <th class="px-4 py-2">Actions</th>
        </tr>
      </thead>
      <tbody id="product-list" class="text-center">
      </tbody>
    </table>

    <script src="{{ asset('assets/js/admin/product.js') }}"></script>
  </div>
  @endsection