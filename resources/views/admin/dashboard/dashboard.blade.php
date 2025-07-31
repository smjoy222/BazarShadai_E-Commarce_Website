@extends('admin.base')
@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/heroicons/1.0.6/css/all.min.css" rel="stylesheet">
<title>Admin Dashboard</title>
@endpush
@section('content')

<div class="bg-gray-100 font-sans leading-normal tracking-normal">
  <div class="flex h-screen">

    <div class="flex-1 flex flex-col overflow-hidden">
      @include('admin.navbar.navbar')
      @include('admin.modal.modal')

      <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-10">
        <div class="max-w-7xl mx-auto">
          <h1 class="text-3xl font-bold text-gray-800 mb-6">Manage Products</h1>
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 ease-in-out flex flex-col items-center" id="add-product">
              <div class="text-green-500 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
              </div>
              <p class="text-xl font-semibold text-gray-700">Add Products</p>
            </div>
            <a href="{{ route('admin-product') }}">
              <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 ease-in-out flex flex-col items-center">
                <div class="text-green-500 mb-4">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                  </svg>
                </div>
                <p class="text-xl font-semibold text-gray-700">View Products</p>
              </div>
            </a>
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 ease-in-out flex flex-col items-center">
              <div class="text-green-500 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
              </div>
              <p class="text-xl font-semibold text-gray-700">View Orders</p>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script src="{{ asset('assets/js/admin/dashboard.js') }}"></script>
  </script>

</div>

@endsection