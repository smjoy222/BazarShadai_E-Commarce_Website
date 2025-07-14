@extends('index')
@push('style')
<title id="page-title">Products - Bazar Shadai</title>
@endpush
@section('main-content')

<!-- Page Header -->
<section class="py-12 mt-0" id="category-header">
  <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center">
      <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
        ALL <span id="category-title" class="text-green-600">PRODUCTS</span>
      </h1>
      <div class="w-24 h-1 bg-green-800 mx-auto mb-6"></div>
      <p id="category-description" class="text-lg text-gray-600 max-w-2xl mx-auto font-poppins">
        Fresh, quality products delivered straight to your door. Quality guaranteed!
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
        <span id="product-count" class="text-gray-700 font-medium">Showing 1-8 of 24 products</span>
      </div>
      <div class="flex items-center space-x-4">
        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
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
    <div id="products-container">
      <!-- Dynamic products will be loaded here by JavaScript -->
    </div>

    <!-- Pagination -->
    <div class="flex justify-center items-center mt-12 space-x-2">
      <button id="prev-btn" class="pagination-btn px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition duration-300 disabled">
        Previous
      </button>
      
      <div id="page-numbers" class="flex space-x-2">
        <button class="pagination-btn page-number px-4 py-2 bg-green-600 text-white rounded-lg active" data-page="1">1</button>
        <button class="pagination-btn page-number px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition duration-300" data-page="2">2</button>
        <button class="pagination-btn page-number px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition duration-300" data-page="3">3</button>
      </div>
      
      <button id="next-btn" class="pagination-btn px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition duration-300">
        Next
      </button>
    </div>

  </div>
</section>

<!-- Hidden category data -->
<script>
window.currentCategory = '{{ $category ?? "vegetables" }}';
console.log('Page loaded with category:', window.currentCategory);
</script>

@endsection