@extends('index')
@push('style')
<title>
  <?php echo strtoupper($category) ?>
  - Bazar Shadai
</title>
@endpush
@section('main-content')

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
        <span class="text-gray-700 font-medium">Showing 12 of 24 products</span>
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
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8" id="product-grid">
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

  <script>
    fetch('/api/productData.php?productCategory={{$category}}')
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.json();
      })
      .then(data => {
        console.log(data[0].image);
        const productGrid = document.getElementById('product-grid');
        productGrid.innerHTML = '';
        data.forEach(product => {
          const productCard = document.createElement('div');
          productCard.className = 'product-card bg-white rounded-2xl shadow-md overflow-hidden';
          productCard.innerHTML = `
            <div class="p-6">
              <div class="bg-gray-100 rounded-xl h-48 flex items-center justify-center mb-4">
                <img src="/assets/${product.image}" alt="${product.name}" class="h-32 w-32 object-contain">
              </div>
              <h3 class="text-xl font-bold text-gray-800 mb-2">${product.name}</h3>
              <div class="flex items-center justify-between mb-3">
                <span class="price-text text-green-600">৳ ${product.price}<span class="text-sm text-gray-500">/= KG</span></span>
              </div>
              <div class="flex items-center mb-4">
                <div class="star-rating flex">
                  <span>${'★'.repeat(product.rating)}${'☆'.repeat(5 - product.rating)}</span>
                </div>
                <span class="text-sm text-gray-500 ml-2">(${product.rating})</span>
              </div>
              <div class="flex space-x-2">
                <button class="btn-buy-now flex-1 py-2 px-4 rounded-lg font-medium transition duration-300">
                  BUY NOW
                </button>
                <button class="btn-add-cart flex-1 py-2 px-4 rounded-lg font-medium transition duration-300">
                  ADD TO CART
                </button>
              </div>
            </div>
          `;

          productGrid.appendChild(productCard);
        });
      })
      .catch(error => console.error('Error fetching product data:', error));
  </script>

</section>

@endsection