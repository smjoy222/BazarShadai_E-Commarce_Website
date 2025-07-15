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
      <!-- Slide 1 -->
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

      <!-- Slide 2 -->
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

      <!-- Slide 3 -->
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

      <!-- Slide 4 -->
      <div class="slide bg-gradient-to-r from-orange-100 to-orange-50 items-center h-full">
        <div class="container mx-auto px-6 flex items-center justify-between h-full">
          <div class="w-1/2 space-y-6">
            <div class="bg-orange-600 text-white px-4 py-2 rounded-full inline-block text-lg font-bold">
              25% OFF
            </div>
            <h1 class="text-6xl md:text-5xl font-bold text-gray-800">
              PREMIUM <span class="text-orange-600">QUALITY</span>
            </h1>
            <p class="text-lg text-gray-600 font-medium">Hand-picked fresh products</p>
            <button class="bg-orange-600 text-white px-8 py-3 rounded-lg hover:bg-orange-700 transition duration-300 font-medium">
              Order Now
            </button>
          </div>
          <div class="w-1/2 flex justify-center">
            <img src="{{ asset('assets/images/slider/slide-4.png') }}" alt="Premium quality" class="max-h-80 object-contain">
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

  <!-- Slide indicators -->
  <div class="flex justify-center mt-6 space-x-2">
    <button class="slide-indicator w-3 h-3 bg-green-600 rounded-full" title="Slide 1" data-slide="0"></button>
    <button class="slide-indicator w-3 h-3 bg-gray-300 rounded-full hover:bg-blue-400" title="Slide 2" data-slide="1"></button>
    <button class="slide-indicator w-3 h-3 bg-gray-300 rounded-full hover:bg-pink-400" title="Slide 3" data-slide="2"></button>
    <button class="slide-indicator w-3 h-3 bg-gray-300 rounded-full hover:bg-orange-400" title="Slide 4" data-slide="3"></button>
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

    <!-- Categories Grid -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 md:gap-6">
      <!-- Vegetables -->
      <a href="{{ route('products', 'vegetable') }}" class="category-item flex flex-col items-center p-4 md:p-6 bg-gray-100 hover:bg-green-100 rounded-2xl transition duration-300 cursor-pointer group no-underline">
        <div class="w-16 h-16 md:w-20 md:h-20 bg-white rounded-full flex items-center justify-center mb-3 md:mb-4 group-hover:shadow-lg transition duration-300 overflow-hidden">
          <img src="{{ asset('assets/images/categories/cate-1.png') }}" alt="Vegetables" class="w-12 h-12 md:w-14 md:h-14 object-contain">
        </div>
        <span class="text-sm md:text-base font-bold text-gray-700 text-center">VEGETABLE</span>
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
            <img src="{{ asset('assets/images/fruits/orange.png') }}" alt="Orange" class="h-32 w-32 object-contain">
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
            <img src="{{ asset('assets/images/veg/green peas.png') }}" alt="Green Peas" class="h-32 w-32 object-contain">
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
            <img src="{{ asset('assets/images/meats/beef.png') }}" alt="Beef" class="h-32 w-32 object-contain">
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
            <img src="{{ asset('assets/images/dairy/eggs.png') }}" alt="Eggs" class="h-32 w-32 object-contain">
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
            <img src="{{ asset('assets/images/veg/alu.png') }}" alt="Potato" class="h-32 w-32 object-contain">
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
            <img src="{{ asset('assets/images/sea-food/salmon.png') }}" alt="Salmon" class="h-32 w-32 object-contain">
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
            <img src="{{ asset('assets/images/veg/brocoli.png') }}" alt="Broccoli" class="h-32 w-32 object-contain">
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
            <img src="{{ asset('assets/images/veg/beetroot.png') }}" alt="Beetroot" class="h-32 w-32 object-contain">
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

@endsection