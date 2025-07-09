@extends('index')
@push('style')
<title>Bazar Shadai</title>
@endpush
@section('main-content')
<!-- Sticky Navbar Start -->
<header>
<nav class="bg-white shadow sticky top-0 z-50">
  <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">
      <!-- Logo Section -->
      <a href="{{ route('home') }}" class="flex items-center space-x-0.5 no-underline">
        <img src="{{ asset('assets/images/logo.png') }}" alt="BazarShadai Logo" class="h-15 w-20">
        <span class="text-2xl font-bold text-green-600">BazarShadai</span>
      </a>
      
      <!-- Center Navigation Links -->
      <div class="hidden md:flex space-x-8 items-center absolute left-1/2 transform -translate-x-1/2">
        <a href="{{ route('home') }}" class="text-gray-700 hover:text-green-600 font-bold no-underline">HOME</a>
        <!-- Shop Dropdown in Navigation -->
        <div class="dropdown">
          <a href="#" class="dropdown-toggle text-gray-700 hover:text-green-600 font-bold no-underline flex items-center">
            SHOP
          </a>
          <div class="dropdown-menu">
            <a href="{{ route('vegetables') }}" class="dropdown-item">
              <div class="flex items-center">
                <span class="text-green-600 font-bold mr-2">🌽</span>
                VEGETABLES
              </div>
            </a>
            <a href="#" class="dropdown-item">
              <div class="flex items-center">
                <span class="text-red-600 font-bold mr-2">🍎</span>
                FRUITS
              </div>
            </a>
            <a href="#" class="dropdown-item">
              <div class="flex items-center">
                <span class="text-red-800 font-bold mr-2">🍗</span>
                MEATS
              </div>
            </a>
            <a href="#" class="dropdown-item">
              <div class="flex items-center">
                <span class="text-blue-600 font-bold mr-2">🐟</span>
                FISH
              </div>
            </a>
            <a href="#" class="dropdown-item">
              <div class="flex items-center">
                <span class="text-teal-600 font-bold mr-2">🍤</span>
                SEA FOOD
              </div>
            </a>
            <a href="#" class="dropdown-item">
              <div class="flex items-center">
                <span class="text-yellow-600 font-bold mr-2">🍶</span>
                DAIRY
              </div>
            </a>
          </div>
        </div>
        <a href="#" class="text-gray-700 hover:text-green-600 font-bold no-underline">CATEGORIES</a>
      </div>
      
      <!-- Right Side Icons and Login -->
      <div class="hidden md:flex space-x-4 items-center">
        <!-- Search Icon -->
        <a href="#" class="text-gray-700 hover:text-green-600 no-underline">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
          </svg>
        </a>
        <!-- Cart Icon -->
        <a href="#" class="text-gray-700 hover:text-green-600 no-underline relative">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.293 2.293c-.188.188-.293.442-.293.707V17h14v-1.293c0-.265-.105-.519-.293-.707L16 13"/>
          </svg>
          <!-- Cart badge (optional) -->
          <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
        </a>
        <a href="{{ route('login') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 font-bold no-underline transition duration-300">SIGN IN</a>
      </div>
      
      <!-- Mobile menu button -->
      <div class="md:hidden">
        <button id="mobile-menu-button" class="text-gray-700 focus:outline-none">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
    </div>
    
    <!-- Mobile menu, show/hide based on menu state. -->
    <div id="mobile-menu" class="md:hidden hidden flex-col space-y-2 pb-4">
      <a href="{{ route('home') }}" class="block text-gray-700 hover:text-green-600 font-medium no-underline">Home</a>
      <a href="#" class="block text-gray-700 hover:text-green-600 font-medium no-underline">Shop</a>
      <a href="#" class="block text-gray-700 hover:text-green-600 font-medium no-underline">Categories</a>
      <div class="flex items-center space-x-4 px-2">
        <!-- Search Icon -->
        <a href="#" class="text-gray-700 hover:text-green-600 no-underline">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
          </svg>
        </a>
        <!-- Cart Icon -->
        <a href="#" class="text-gray-700 hover:text-green-600 no-underline relative">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.293 2.293c-.188.188-.293.442-.293.707V17h14v-1.293c0-.265-.105-.519-.293-.707L16 13"/>
          </svg>
          <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
        </a>
      </div>
      <a href="{{ route('login') }}" class="block bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 font-medium no-underline transition duration-300 text-center">Login</a>
    </div>
  </div>
</nav>
</header>
<!-- Sticky Navbar End -->

<!-- Hero Slider Section Start -->
<section class="relative overflow-hidden mt-8 mx-6 md:mx-8">
  <div class="relative flex items-center">
    <!-- Left Navigation Arrow -->
    <button id="prevBtn" title="Previous slide" class="absolute left-0 top-1/2 transform -translate-y-1/2 -translate-x-12 bg-white hover:bg-gray-50 border border-gray-300 rounded-full p-3 z-10 shadow-lg">
      <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
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
            <img src="{{ asset('assets/images/slide-1.png') }}" alt="Woman with vegetables" class="max-h-80 object-contain">
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
            <img src="{{ asset('assets/images/slide-2.png') }}" alt="Fresh fruits" class="max-h-80 object-contain">
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
            <img src="{{ asset('assets/images/slide-3.png') }}" alt="Daily essentials" class="max-h-80 object-contain">
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
            <img src="{{ asset('assets/images/slide-4.png') }}" alt="Daily essentials" class="max-h-80 object-contain">
          </div>
        </div>
      </div>
    </div>

    <!-- Right Navigation Arrow -->
    <button id="nextBtn" title="Next slide" class="absolute right-0 top-1/2 transform -translate-y-1/2 translate-x-12 bg-white hover:bg-gray-50 border border-gray-300 rounded-full p-3 z-10 shadow-lg">
      <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
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
      <div class="category-item flex flex-col items-center p-4 md:p-6 bg-gray-100 hover:bg-green-100 rounded-2xl transition duration-300 cursor-pointer group">
        <div class="w-16 h-16 md:w-20 md:h-20 bg-white rounded-full flex items-center justify-center mb-3 md:mb-4 group-hover:shadow-lg transition duration-300 overflow-hidden">
          <img src="{{ asset('assets/images/cate-1.png') }}" alt="Vegetables" class="w-12 h-12 md:w-14 md:h-14 object-contain">
        </div>
        <span class="text-sm md:text-base font-bold text-gray-700 text-center">VEGETABLES</span>
      </div>

      <!-- Fruits -->
      <div class="category-item flex flex-col items-center p-4 md:p-6 bg-gray-100 hover:bg-red-100 rounded-2xl transition duration-300 cursor-pointer group">
        <div class="w-16 h-16 md:w-20 md:h-20 bg-white rounded-full flex items-center justify-center mb-3 md:mb-4 group-hover:shadow-lg transition duration-300 overflow-hidden">
          <img src="{{ asset('assets/images/cate-2.png') }}" alt="Fruits" class="w-12 h-12 md:w-14 md:h-14 object-contain">
        </div>
        <span class="text-sm md:text-base font-bold text-gray-700 text-center">FRUITS</span>
      </div>

      <!-- Meats -->
      <div class="category-item flex flex-col items-center p-4 md:p-6 bg-gray-100 hover:bg-red-100 rounded-2xl transition duration-300 cursor-pointer group">
        <div class="w-16 h-16 md:w-20 md:h-20 bg-white rounded-full flex items-center justify-center mb-3 md:mb-4 group-hover:shadow-lg transition duration-300 overflow-hidden">
          <img src="{{ asset('assets/images/cate-3.png') }}" alt="Meats" class="w-12 h-12 md:w-14 md:h-14 object-contain">
        </div>
        <span class="text-sm md:text-base font-bold text-gray-700 text-center">MEATS</span>
      </div>

      <!-- Fish -->
      <div class="category-item flex flex-col items-center p-4 md:p-6 bg-gray-100 hover:bg-blue-100 rounded-2xl transition duration-300 cursor-pointer group">
        <div class="w-16 h-16 md:w-20 md:h-20 bg-white rounded-full flex items-center justify-center mb-3 md:mb-4 group-hover:shadow-lg transition duration-300 overflow-hidden">
          <img src="{{ asset('assets/images/cate-4.png') }}" alt="Fish" class="w-12 h-12 md:w-14 md:h-14 object-contain">
        </div>
        <span class="text-sm md:text-base font-bold text-gray-700 text-center">FISH</span>
      </div>

      <!-- Sea Food -->
      <div class="category-item flex flex-col items-center p-4 md:p-6 bg-gray-100 hover:bg-teal-100 rounded-2xl transition duration-300 cursor-pointer group">
        <div class="w-16 h-16 md:w-20 md:h-20 bg-white rounded-full flex items-center justify-center mb-3 md:mb-4 group-hover:shadow-lg transition duration-300 overflow-hidden">
          <img src="{{ asset('assets/images/cate-5.png') }}" alt="Sea Food" class="w-12 h-12 md:w-14 md:h-14 object-contain">
        </div>
        <span class="text-sm md:text-base font-bold text-gray-700 text-center">SEA FOOD</span>
      </div>

      <!-- Dairy -->
      <div class="category-item flex flex-col items-center p-4 md:p-6 bg-gray-100 hover:bg-yellow-100 rounded-2xl transition duration-300 cursor-pointer group">
        <div class="w-16 h-16 md:w-20 md:h-20 bg-white rounded-full flex items-center justify-center mb-3 md:mb-4 group-hover:shadow-lg transition duration-300 overflow-hidden">
          <img src="{{ asset('assets/images/cate-6.png') }}" alt="Dairy" class="w-12 h-12 md:w-14 md:h-14 object-contain">
        </div>
        <span class="text-sm md:text-base font-bold text-gray-700 text-center">DAIRY</span>
      </div>
    </div>
  </div>
</section>
<!-- Categories Section End -->
@endsection