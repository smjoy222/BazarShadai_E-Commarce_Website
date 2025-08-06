@extends('index')
<?php use App\Models\Product; ?>
@push('style')
  <title>
    <?php echo strtoupper($category) ?>
    - Bazar Shadai
  </title>
@endpush
@section('main-content')

  <?php 
    echo $productCount
    ?>

  <!-- Page Header -->
  <section class="bg-green-50 py-12 mt-0">
    <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center">
      <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
      ALL <span class="text-green-600">
        <?php echo strtoupper($category); ?>
      </span>
      </h1>
      <div class="w-24 h-1 bg-green-800 mx-auto mb-6"></div>
      <p class="text-lg text-gray-600 max-w-2xl mx-auto font-poppins">
      Fresh, organic vegetables delivered straight to your door. Quality guaranteed!
      </p>
    </div>
    </div>
  </section>

  <!-- Products Grid Section -->
  <section class="py-16 bg-gray-50">
    <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Filter and Sort Options -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-12">
      <div class="flex items-center space-x-4 mb-4 md:mb-0">
      <span class="text-gray-700 font-medium">Showing
        <?php echo $productCount?> of
        <?php echo $productCount?>
        products
      </span>
      </div>
      <div class="flex items-center space-x-4">
      <select
        class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
        <option>Sort by Price</option>
        <option>Price: Low to High</option>
        <option>Price: High to Low</option>
        <option>Most Popular</option>
      </select>
      <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300">
        Filter
      </button>
      </div>
    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8" id="product-grid">
      @forelse($products as $product)
      <x-product-card :product="$product" :loop-iteration="$loop->iteration" />
    @empty
      <!-- No Products Available -->
      <div class="col-span-full text-center py-12">
      <div class="w-32 h-32 mx-auto mb-6 bg-gray-200 rounded-full flex items-center justify-center">
      <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M20 7l-8-4-8 4m16 0l-8 4-8-4m16 0v10l-8 4-8-4V7" />
      </svg>
      </div>
      <h3 class="text-2xl font-semibold text-gray-700 mb-2">No products available</h3>
      <p class="text-gray-500">Check back soon for fresh products!</p>
      </div>
    @endforelse
    </div>

    <!-- Pagination -->
    <div class="flex justify-center items-center mt-12 space-x-2" id="pagination-container">
      <button id="prev-btn"
      class="pagination-btn px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition duration-300 disabled">
      Previous
      </button>

      <div id="page-numbers" class="flex space-x-2">
      <!-- Page numbers will be inserted dynamically -->
      </div>

      <button id="next-btn"
      class="pagination-btn px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition duration-300">
      Next
      </button>
    </div>

    <!-- Store total pages in a hidden input for JS -->
    <input type="hidden" id="total-pages" value="{{ ceil($productCount / 12) }}">

    </div>
  </section>

@endsection