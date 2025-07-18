@extends('index')
@push('style')
<title>Dashboard - BazarShadai</title>
@endpush
@section('main-content')

<!-- User Welcome Section -->
<section class="mt-8 mx-6 md:mx-8">
  <div class="bg-gradient-to-r from-green-50 to-blue-50 rounded-2xl p-6 mb-8">
    <div class="container mx-auto">
      <div class="flex items-center justify-center">
        <div class="text-center">
          <h2 class="text-3xl font-bold text-gray-800">Welcome back, {{ $user->name }}!</h2>
          <p class="text-gray-600 mt-2">Ready to explore fresh products today?</p>
        </div>
      </div>
    </div>
  </div>
</section>



@endsection
