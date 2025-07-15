@extends('index')
@push('style')
<title>Bazar Shadai</title>
@endpush
@section('main-content')

<!-- Hero Slider Section Start -->
<section class="relative overflow-hidden mt-8 mx-6 md:mx-8">
  <div class="relative flex items-center">
    <!-- Left Navigation Arrow -->
    <button id="prevBtn" title="Previous slide" class="absolute left-0 top-1/2 transform -translate-y-1/2 -translate-x-12 bg-white hover:bg-gray-50 border border-gray-300 rounded-full p-3 z-10 shadow-lg">
      <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
      </svg>
    </button>

    <!-- Slider Container -->
    <div class="slider-container relative h-96 md:h-[400px] w-full rounded-2xl overflow-hidden">
      <!-- Slide 1 - Remove 'flex' class -->
      <div class="slide active bg-gradient-to-r from-green-100 to-green-50 items-center h-full">
        <div class="container mx-auto px-6 flex items-center justify-between h-full">
          <div class="w-1/2 space-y-6">
            <div class="bg-green-600 text-white px-4 py-2 rounded-full inline-block text-lg font-bold">
              50% OFF
            </div>
            <h1 class="text-6xl md:text-5xl font-bold text-gray-800">
              BIG <span class="text-green-600">SALE</span> ON VEGETABLES
            </h1>
            <p class="text-lg text-gray-600 font-medium">Products for vegetarians</p>
            <button class="bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 transition duration-300 font-medium">
              Shop Now
            </button>
          </div>
          <div class="w-1/2 flex justify-center">
            <img src="{{ asset('assets/images/slider/slide-1.png') }}" alt="Woman with vegetables" class="max-h-80 object-contain">
          </div>
        </div>
      </div>

      <!-- Slide 2 - Remove 'flex' class -->
      <div class="slide bg-gradient-to-r from-blue-100 to-blue-50 items-center h-full">
        <div class="container mx-auto px-6 flex items-center justify-between h-full">
          <div class="w-1/2 space-y-6">
            <div class="bg-blue-600 text-white px-4 py-2 rounded-full inline-block text-lg font-bold">
              30% OFF
            </div>
            <h1 class="text-6xl md:text-5xl font-bold text-gray-800">
              FRESH <span class="text-blue-600">FRUITS</span>
            </h1>
            <p class="text-lg text-gray-600 font-medium">Organic and natural fruits</p>
            <button class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition duration-300 font-medium">
              Explore Now
            </button>
          </div>
          <div class="w-1/2 flex justify-center">
            <img src="{{ asset('assets/images/slider/slide-2.png') }}" alt="Fresh fruits" class="max-h-80 object-contain">
          </div>
        </div>
      </div>

      <!-- Slide 3 - Remove 'flex' class -->
      <div class="slide bg-gradient-to-r from-purple-100 to-purple-50 items-center h-full">
        <div class="container mx-auto px-6 flex items-center justify-between h-full">
          <div class="w-1/2 space-y-6">
            <div class="bg-pink-600 text-white px-4 py-2 rounded-full inline-block text-lg font-bold">
              40% OFF
            </div>
            <h1 class="text-6xl md:text-5xl font-bold text-gray-800">
              DAILY <span class="text-pink-600">ESSENTIALS</span>
            </h1>
            <p class="text-lg text-gray-600 font-medium">Everything you need daily</p>
            <button class="bg-pink-600 text-white px-8 py-3 rounded-lg hover:bg-pink-700 transition duration-300 font-medium">
              Shop Daily
            </button>
          </div>
          <div class="w-1/2 flex justify-center">
            <img src="{{ asset('assets/images/slider/slide-3.png') }}" alt="Daily essentials" class="max-h-80 object-contain">
          </div>
        </div>
      </div>

      <!-- Slide 4 - Remove 'flex' class -->
      <div class="slide bg-gradient-to-r from-purple-100 to-purple-50 items-center h-full">
        <div class="container mx-auto px-6 flex items-center justify-between h-full">
          <div class="w-1/2 space-y-6">
            <div class="bg-purple-600 text-white px-4 py-2 rounded-full inline-block text-lg font-bold">
              40% OFF
            </div>
            <h1 class="text-6xl md:text-5xl font-bold text-gray-800">
              DAILY <span class="text-purple-600">ESSENTIALS</span>
            </h1>
            <p class="text-lg text-gray-600 font-medium">Everything you need daily</p>
            <button class="bg-purple-600 text-white px-8 py-3 rounded-lg hover:bg-purple-700 transition duration-300 font-medium">
              Shop Daily
            </button>
          </div>
          <div class="w-1/2 flex justify-center">
            <img src="{{ asset('assets/images/slider/slide-4.png') }}" alt="Daily essentials" class="max-h-80 object-contain">
          </div>
        </div>
      </div>
    </div>

    <!-- Right Navigation Arrow -->
    <button id="nextBtn" title="Next slide" class="absolute right-0 top-1/2 transform -translate-y-1/2 translate-x-12 bg-white hover:bg-gray-50 border border-gray-300 rounded-full p-3 z-10 shadow-lg">
      <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
      </svg>
    </button>
  </div>

  <!-- Slide indicators moved outside -->
  <div class="flex justify-center mt-6 space-x-2">
    <button class="slide-indicator w-3 h-3 bg-green-600 rounded-full" title="Slide 1" data-slide="0"></button>
    <button class="slide-indicator w-3 h-3 bg-gray-300 rounded-full hover:bg-gray-400" title="Slide 2" data-slide="1"></button>
    <button class="slide-indicator w-3 h-3 bg-gray-300 rounded-full hover:bg-gray-400" title="Slide 3" data-slide="2"></button>
    <button class="slide-indicator w-3 h-3 bg-gray-300 rounded-full hover:bg-gray-400" title="Slide 4" data-slide="3"></button>
  </div>
</section>
<!-- Hero Slider Section End -->

<!-- Categories Section Start -->
<section class="mt-16 mx-6 md:mx-8" id="categories">
  <div class="container max-w-7xl mx-auto">
    <!-- Section Header -->
    <div class="flex items-center justify-between mb-8">
      <h2 class="text-2xl md:text-3xl font-bold text-gray-800">Categories</h2>
    </div>

    <!-- Categories Grid - 6 Categories with Images -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 md:gap-6">
      <!-- Vegetables -->
      <a href="{{ route('products', 'vegetables') }}" class="category-item flex flex-col items-center p-4 md:p-6 bg-gray-100 hover:bg-green-100 rounded-2xl transition duration-300 cursor-pointer group no-underline">
        <div class="w-16 h-16 md:w-20 md:h-20 bg-white rounded-full flex items-center justify-center mb-3 md:mb-4 group-hover:shadow-lg transition duration-300 overflow-hidden">
          <img src="{{ asset('assets/images/categories/cate-1.png') }}" alt="Vegetables" class="w-12 h-12 md:w-14 md:h-14 object-contain">
        </div>
        <span class="text-sm md:text-base font-bold text-gray-700 text-center">VEGETABLES</span>
      </a>


      <!-- Fruits -->
      <a href="{{ route('products', 'fruits') }}" class="category-item flex flex-col items-center p-4 md:p-6 bg-gray-100 hover:bg-red-100 rounded-2xl transition duration-300 cursor-pointer group no-underline">
        <div class="w-16 h-16 md:w-20 md:h-20 bg-white rounded-full flex items-center justify-center mb-3 md:mb-4 group-hover:shadow-lg transition duration-300 overflow-hidden">
          <img src="{{ asset('assets/images/categories/cate-2.png') }}" alt="Fruits" class="w-12 h-12 md:w-14 md:h-14 object-contain">
        </div>
        <span class="text-sm md:text-base font-bold text-gray-700 text-center">FRUITS</span>
      </a>

      <!-- Meats -->
      <a href="{{ route('products', 'meats') }}" class="category-item flex flex-col items-center p-4 md:p-6 bg-gray-100 hover:bg-red-100 rounded-2xl transition duration-300 cursor-pointer group no-underline">
        <div class="w-16 h-16 md:w-20 md:h-20 bg-white rounded-full flex items-center justify-center mb-3 md:mb-4 group-hover:shadow-lg transition duration-300 overflow-hidden">
          <img src="{{ asset('assets/images/categories/cate-3.png') }}" alt="Meats" class="w-12 h-12 md:w-14 md:h-14 object-contain">
        </div>
        <span class="text-sm md:text-base font-bold text-gray-700 text-center">MEATS</span>
      </a>

      <!-- Fish -->
      <a href="{{ route('products', 'fish') }}" class="category-item flex flex-col items-center p-4 md:p-6 bg-gray-100 hover:bg-blue-100 rounded-2xl transition duration-300 cursor-pointer group no-underline">
        <div class="w-16 h-16 md:w-20 md:h-20 bg-white rounded-full flex items-center justify-center mb-3 md:mb-4 group-hover:shadow-lg transition duration-300 overflow-hidden">
          <img src="{{ asset('assets/images/categories/cate-4.png') }}" alt="Fish" class="w-12 h-12 md:w-14 md:h-14 object-contain">
        </div>
        <span class="text-sm md:text-base font-bold text-gray-700 text-center">FISH</span>
      </a>

      <!-- Sea Food -->
      <a href="{{ route('products', 'seafood') }}" class="category-item flex flex-col items-center p-4 md:p-6 bg-gray-100 hover:bg-teal-100 rounded-2xl transition duration-300 cursor-pointer group no-underline">
        <div class="w-16 h-16 md:w-20 md:h-20 bg-white rounded-full flex items-center justify-center mb-3 md:mb-4 group-hover:shadow-lg transition duration-300 overflow-hidden">
          <img src="{{ asset('assets/images/categories/cate-5.png') }}" alt="Sea Food" class="w-12 h-12 md:w-14 md:h-14 object-contain">
        </div>
        <span class="text-sm md:text-base font-bold text-gray-700 text-center">SEA FOOD</span>
      </a>

      <!-- Dairy -->
      <a href="{{ route('products', 'dairy') }}" class="category-item flex flex-col items-center p-4 md:p-6 bg-gray-100 hover:bg-yellow-100 rounded-2xl transition duration-300 cursor-pointer group no-underline">
        <div class="w-16 h-16 md:w-20 md:h-20 bg-white rounded-full flex items-center justify-center mb-3 md:mb-4 group-hover:shadow-lg transition duration-300 overflow-hidden">
          <img src="{{ asset('assets/images/categories/cate-6.png') }}" alt="Dairy" class="w-12 h-12 md:w-14 md:h-14 object-contain">
        </div>
        <span class="text-sm md:text-base font-bold text-gray-700 text-center">DAIRY</span>
      </a>
    </div>
  </div>
</section>
<!-- Categories Section End -->

<!-- Featured Products Section Start -->
<section class="py-16 bg-gray-50 mt-16">
  <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Section Header -->
    <div class="text-center mb-12">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
        Featured <span class="text-green-600">Products</span>
      </h2>
      <div class="w-24 h-1 bg-green-600 mx-auto mb-6"></div>
      <p class="text-lg text-gray-600 max-w-2xl mx-auto">
        Discover our handpicked selection of fresh, quality products at the best prices
      </p>
    </div>

    <!-- Featured Products Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
      <!-- Product 1 - Orange -->
      <div class="product-card bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
        <div class="p-6">
          <div class="bg-gray-100 rounded-xl h-48 flex items-center justify-center mb-4 relative">
            <span class="absolute top-2 left-2 bg-green-600 text-white text-xs px-2 py-1 rounded-full">FRESH</span>
            <img src="{{ asset('assets/images/fruits/orange.png') }}" alt="Orange" class="h-32 w-32 object-contain" onerror="this.src='{{ asset('assets/images/placeholder.png') }}'">
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-2">Orange (Komola)</h3>
          <div class="flex items-center justify-between mb-3">
            <span class="text-2xl font-bold text-green-600">৳ 100<span class="text-sm text-gray-500">/= 1 kg</span></span>
          </div>
          <div class="flex items-center mb-4">
            <div class="flex text-yellow-400">
              <span>★★★★☆</span>
            </div>
            <span class="text-sm text-gray-500 ml-2">(4.3)</span>
          </div>
          <div class="flex space-x-2">
            <button class="flex-1 bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 font-medium transition duration-300">
              BUY NOW
            </button>
            <button class="flex-1 border border-green-600 text-green-600 py-2 px-4 rounded-lg hover:bg-green-50 font-medium transition duration-300">
              ADD TO CART
            </button>
          </div>
        </div>
      </div>

      <!-- Product 2 - Green Peas -->
      <div class="product-card bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
        <div class="p-6">
          <div class="bg-gray-100 rounded-xl h-48 flex items-center justify-center mb-4 relative">
            <span class="absolute top-2 left-2 bg-green-600 text-white text-xs px-2 py-1 rounded-full">ORGANIC</span>
            <img src="{{ asset('assets/images/veg/green peas.png') }}" alt="Green Peas" class="h-32 w-32 object-contain" onerror="this.src='{{ asset('assets/images/placeholder.png') }}'">
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-2">Green Peas (Motorshuti)</h3>
          <div class="flex items-center justify-between mb-3">
            <span class="text-2xl font-bold text-green-600">৳ 40<span class="text-sm text-gray-500">/= 500 gm</span></span>
          </div>
          <div class="flex items-center mb-4">
            <div class="flex text-yellow-400">
              <span>★★★★☆</span>
            </div>
            <span class="text-sm text-gray-500 ml-2">(4.3)</span>
          </div>
          <div class="flex space-x-2">
            <button class="flex-1 bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 font-medium transition duration-300">
              BUY NOW
            </button>
            <button class="flex-1 border border-green-600 text-green-600 py-2 px-4 rounded-lg hover:bg-green-50 font-medium transition duration-300">
              ADD TO CART
            </button>
          </div>
        </div>
      </div>

      <!-- Product 3 - Beef -->
      <div class="product-card bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
        <div class="p-6">
          <div class="bg-gray-100 rounded-xl h-48 flex items-center justify-center mb-4 relative">
            <span class="absolute top-2 left-2 bg-red-600 text-white text-xs px-2 py-1 rounded-full">PREMIUM</span>
            <img src="{{ asset('assets/images/meats/beef.png') }}" alt="Beef" class="h-32 w-32 object-contain" onerror="this.src='{{ asset('assets/images/placeholder.png') }}'">
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-2">Beef (Gorur Mangsho)</h3>
          <div class="flex items-center justify-between mb-3">
            <span class="text-2xl font-bold text-green-600">৳ 650<span class="text-sm text-gray-500">/= 1 kg</span></span>
          </div>
          <div class="flex items-center mb-4">
            <div class="flex text-yellow-400">
              <span>★★★★☆</span>
            </div>
            <span class="text-sm text-gray-500 ml-2">(4.3)</span>
          </div>
          <div class="flex space-x-2">
            <button class="flex-1 bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 font-medium transition duration-300">
              BUY NOW
            </button>
            <button class="flex-1 border border-green-600 text-green-600 py-2 px-4 rounded-lg hover:bg-green-50 font-medium transition duration-300">
              ADD TO CART
            </button>
          </div>
        </div>
      </div>

      <!-- Product 4 - Eggs -->
      <div class="product-card bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
        <div class="p-6">
          <div class="bg-gray-100 rounded-xl h-48 flex items-center justify-center mb-4 relative">
            <span class="absolute top-2 left-2 bg-yellow-600 text-white text-xs px-2 py-1 rounded-full">FARM FRESH</span>
            <img src="{{ asset('assets/images/dairy/eggs.png') }}" alt="Eggs" class="h-32 w-32 object-contain" onerror="this.src='{{ asset('assets/images/placeholder.png') }}'">
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-2">Farm Eggs (Dim)</h3>
          <div class="flex items-center justify-between mb-3">
            <span class="text-2xl font-bold text-green-600">৳ 120<span class="text-sm text-gray-500">/= 12 pieces</span></span>
          </div>
          <div class="flex items-center mb-4">
            <div class="flex text-yellow-400">
              <span>★★★★★</span>
            </div>
            <span class="text-sm text-gray-500 ml-2">(4.8)</span>
          </div>
          <div class="flex space-x-2">
            <button class="flex-1 bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 font-medium transition duration-300">
              BUY NOW
            </button>
            <button class="flex-1 border border-green-600 text-green-600 py-2 px-4 rounded-lg hover:bg-green-50 font-medium transition duration-300">
              ADD TO CART
            </button>
          </div>
        </div>
      </div>

      <!-- Product 5 - Potato -->
      <div class="product-card bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
        <div class="p-6">
          <div class="bg-gray-100 rounded-xl h-48 flex items-center justify-center mb-4 relative">
            <span class="absolute top-2 left-2 bg-green-600 text-white text-xs px-2 py-1 rounded-full">BESTSELLER</span>
            <img src="{{ asset('assets/images/veg/alu.png') }}" alt="Potato" class="h-32 w-32 object-contain" onerror="this.src='{{ asset('assets/images/placeholder.png') }}'">
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-2">Potato (Alu)</h3>
          <div class="flex items-center justify-between mb-3">
            <span class="text-2xl font-bold text-green-600">৳ 50<span class="text-sm text-gray-500">/= 1 kg</span></span>
          </div>
          <div class="flex items-center mb-4">
            <div class="flex text-yellow-400">
              <span>★★★★☆</span>
            </div>
            <span class="text-sm text-gray-500 ml-2">(4.0)</span>
          </div>
          <div class="flex space-x-2">
            <button class="flex-1 bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 font-medium transition duration-300">
              BUY NOW
            </button>
            <button class="flex-1 border border-green-600 text-green-600 py-2 px-4 rounded-lg hover:bg-green-50 font-medium transition duration-300">
              ADD TO CART
            </button>
          </div>
        </div>
      </div>

      <!-- Product 6 - Salmon -->
      <div class="product-card bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
        <div class="p-6">
          <div class="bg-gray-100 rounded-xl h-48 flex items-center justify-center mb-4 relative">
            <span class="absolute top-2 left-2 bg-blue-600 text-white text-xs px-2 py-1 rounded-full">IMPORTED</span>
            <img src="{{ asset('assets/images/sea-food/salmon.png') }}" alt="Salmon" class="h-32 w-32 object-contain" onerror="this.src='{{ asset('assets/images/placeholder.png') }}'">
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-2">Fresh Salmon</h3>
          <div class="flex items-center justify-between mb-3">
            <span class="text-2xl font-bold text-green-600">৳ 1200<span class="text-sm text-gray-500">/= 1 kg</span></span>
          </div>
          <div class="flex items-center mb-4">
            <div class="flex text-yellow-400">
              <span>★★★★★</span>
            </div>
            <span class="text-sm text-gray-500 ml-2">(4.7)</span>
          </div>
          <div class="flex space-x-2">
            <button class="flex-1 bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 font-medium transition duration-300">
              BUY NOW
            </button>
            <button class="flex-1 border border-green-600 text-green-600 py-2 px-4 rounded-lg hover:bg-green-50 font-medium transition duration-300">
              ADD TO CART
            </button>
          </div>
        </div>
      </div>

      <!-- Product 7 - Broccoli -->
      <div class="product-card bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
        <div class="p-6">
          <div class="bg-gray-100 rounded-xl h-48 flex items-center justify-center mb-4 relative">
            <span class="absolute top-2 left-2 bg-green-600 text-white text-xs px-2 py-1 rounded-full">HEALTHY</span>
            <img src="{{ asset('assets/images/veg/brocoli.png') }}" alt="Broccoli" class="h-32 w-32 object-contain" onerror="this.src='{{ asset('assets/images/placeholder.png') }}'">
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-2">Fresh Broccoli</h3>
          <div class="flex items-center justify-between mb-3">
            <span class="text-2xl font-bold text-green-600">৳ 80<span class="text-sm text-gray-500">/= 500 gm</span></span>
          </div>
          <div class="flex items-center mb-4">
            <div class="flex text-yellow-400">
              <span>★★★★☆</span>
            </div>
            <span class="text-sm text-gray-500 ml-2">(4.2)</span>
          </div>
          <div class="flex space-x-2">
            <button class="flex-1 bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 font-medium transition duration-300">
              BUY NOW
            </button>
            <button class="flex-1 border border-green-600 text-green-600 py-2 px-4 rounded-lg hover:bg-green-50 font-medium transition duration-300">
              ADD TO CART
            </button>
          </div>
        </div>
      </div>

      <!-- Product 8 - Beetroot -->
      <div class="product-card bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
        <div class="p-6">
          <div class="bg-gray-100 rounded-xl h-48 flex items-center justify-center mb-4 relative">
            <span class="absolute top-2 left-2 bg-purple-600 text-white text-xs px-2 py-1 rounded-full">NUTRITIOUS</span>
            <img src="{{ asset('assets/images/veg/beetroot.png') }}" alt="Beetroot" class="h-32 w-32 object-contain" onerror="this.src='{{ asset('assets/images/placeholder.png') }}'">
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-2">Beetroot (Bit)</h3>
          <div class="flex items-center justify-between mb-3">
            <span class="text-2xl font-bold text-green-600">৳ 60<span class="text-sm text-gray-500">/= 1 kg</span></span>
          </div>
          <div class="flex items-center mb-4">
            <div class="flex text-yellow-400">
              <span>★★★★☆</span>
            </div>
            <span class="text-sm text-gray-500 ml-2">(4.1)</span>
          </div>
          <div class="flex space-x-2">
            <button class="flex-1 bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 font-medium transition duration-300">
              BUY NOW
            </button>
            <button class="flex-1 border border-green-600 text-green-600 py-2 px-4 rounded-lg hover:bg-green-50 font-medium transition duration-300">
              ADD TO CART
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Featured Products Section End -->

<!-- Footer Section Start -->
<footer class="bg-gray-900 text-white py-16">
  <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

      <!-- Social Media Section -->
      <div class="space-y-6">
        <h3 class="text-lg font-bold text-white mb-6">SOCIAL MEDIA</h3>
        <div class="flex space-x-4">
          <!-- Facebook -->
          <a href="#" class="social-icon w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center hover:bg-blue-700 transition duration-300">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
            </svg>
          </a>
          <!-- Twitter -->
          <a href="#" class="social-icon w-10 h-10 bg-blue-400 rounded-lg flex items-center justify-center hover:bg-blue-500 transition duration-300">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
            </svg>
          </a>
          <!-- Instagram -->
          <a href="#" class="social-icon w-10 h-10 bg-pink-600 rounded-lg flex items-center justify-center hover:bg-pink-700 transition duration-300">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 6.62 5.367 11.987 11.988 11.987 6.62 0 11.987-5.367 11.987-11.987C24.014 5.367 18.637.001 12.017.001zM8.449 16.988c-1.297 0-2.448-.49-3.323-1.297C4.151 14.81 3.622 13.659 3.622 12.362c0-1.297.529-2.448 1.504-3.323.975-.875 2.126-1.404 3.323-1.404 1.297 0 2.448.529 3.323 1.404.875.875 1.404 2.026 1.404 3.323 0 1.297-.529 2.448-1.404 3.329-.875.88-2.026 1.297-3.323 1.297zm7.83-9.476c-.529 0-.975-.446-.975-.975 0-.529.446-.975.975-.975.529 0 .975.446.975.975 0 .529-.446.975-.975.975z" />
            </svg>
          </a>
          <!-- YouTube -->
          <a href="#" class="social-icon w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center hover:bg-red-700 transition duration-300">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
            </svg>
          </a>
        </div>
      </div>

      <!-- Content Section -->
      <div class="space-y-4">
        <h3 class="text-lg font-bold text-white mb-6">CONTENT</h3>
        <div class="mt-8">
          <h4 class="text-sm font-semibold text-gray-400 mb-3">Recent</h4>
          <div class="space-y-2">
            <a href="#" class="block text-gray-300 hover:text-white transition duration-300 text-sm">Fresh Arrivals</a>
            <a href="#" class="block text-gray-300 hover:text-white transition duration-300 text-sm">Seasonal Products</a>
            <a href="#" class="block text-gray-300 hover:text-white transition duration-300 text-sm">Best Offers</a>
          </div>
        </div>
      </div>

      <!-- Help Section -->
      <div class="space-y-4">
        <h3 class="text-lg font-bold text-white mb-6">HELP</h3>
        <div class="space-y-3">
          <a href="#" class="block text-gray-300 hover:text-white transition duration-300">FAQs</a>
          <a href="#" class="block text-gray-300 hover:text-white transition duration-300">Contact</a>
          <a href="#" class="block text-gray-300 hover:text-white transition duration-300">Delivery Settings</a>
          <a href="#" class="block text-gray-300 hover:text-white transition duration-300">Terms & Conditions</a>
          <a href="#" class="block text-gray-300 hover:text-white transition duration-300">Customer Support</a>
          <a href="#" class="block text-gray-300 hover:text-white transition duration-300">Return Policy</a>
        </div>
      </div>
      <!-- legal Section -->
      <div class="space-y-3">
        <h3 class="text-lg font-bold text-white mb-6">LEGAL</h3>
        <div class="space-y-2">
          <a href="#" class="block text-gray-300 hover:text-white transition duration-300 text-sm">Privacy Policy</a>
          <a href="#" class="block text-gray-300 hover:text-white transition duration-300 text-sm">Cookie Policy</a>
          <a href="#" class="block text-gray-300 hover:text-white transition duration-300 text-sm">About Us</a>
        </div>
      </div>
    </div>

    <!-- Divider -->
    <div class="border-t border-gray-700 mt-12 pt-8">
      <div class="flex flex-col md:flex-row justify-between items-center">
        <!-- Logo and Copyright -->
        <div class="flex items-center space-x-4 mb-4 md:mb-0">
          <div class="flex items-center space-x-2">
            <img src="{{ asset('assets/images/logo.png') }}" alt="BazarShadai Logo" class="h-8 w-10">
            <span class="text-xl font-bold text-green-400">BazarShadai</span>
          </div>
        </div>

        <!-- Copyright Text -->
        <div class="text-center md:text-left">
          <p class="text-gray-400 text-sm">
            Copyright ©2025 BazarShadai Company S.L. All rights reserved.
          </p>
        </div>

        <!-- Language Selector -->
        <div class="mt-4 md:mt-0">
          <select class="bg-gray-800 border border-gray-600 text-white px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            <option value="en">English</option>
            <option value="bn">বাংলা</option>
          </select>
        </div>
      </div>
    </div>

    <!-- Bottom Company Links -->
    <div class="mt-8 pt-6 border-t border-gray-800">
      <div class="text-center">
        <p class="text-gray-500 text-sm mb-4">BazarShadai Company Projects</p>
        <div class="flex flex-wrap justify-center space-x-6 text-sm">
          <a href="#" class="text-gray-400 hover:text-white transition duration-300">BazarShadai</a>
          <a href="#" class="text-gray-400 hover:text-white transition duration-300">FreshFood</a>
          <a href="#" class="text-gray-400 hover:text-white transition duration-300">QuickDelivery</a>
          <a href="#" class="text-gray-400 hover:text-white transition duration-300">OrganicMarket</a>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- Footer Section End -->

@endsection