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

          <!-- Shop Dropdown -->
          <div class="dropdown">
            <a href="#" class="dropdown-toggle text-gray-700 hover:text-green-600 font-bold no-underline flex items-center">
              SHOP
            </a>
            <div class="dropdown-menu">
              <a href="{{ route('products', 'vegetables') }}" class="dropdown-item">
                <div class="flex items-center">
                  <span class="text-green-600 mr-2">🌽</span>
                  VEGETABLES
                </div>
              </a>
              <a href="{{ route('products', 'fruits') }}" class="dropdown-item">
                <div class="flex items-center">
                  <span class="text-red-600 mr-2">🍎</span>
                  FRUITS
                </div>
              </a>
              <a href="{{ route('products', 'meats') }}" class="dropdown-item">
                <div class="flex items-center">
                  <span class="text-red-800 mr-2">🍗</span>
                  MEATS
                </div>
              </a>
              <a href="{{ route('products', 'fish') }}" class="dropdown-item">
                <div class="flex items-center">
                  <span class="text-blue-600 mr-2">🐟</span>
                  FISH
                </div>
              </a>
              <a href="{{ route('products', 'seafood') }}" class="dropdown-item">
                <div class="flex items-center">
                  <span class="text-teal-600 mr-2">🍤</span>
                  SEA FOOD
                </div>
              </a>
              <a href="{{ route('products', 'dairy') }}" class="dropdown-item">
                <div class="flex items-center">
                  <span class="text-yellow-600 mr-2">🍶</span>
                  DAIRY
                </div>
              </a>
            </div>
          </div>

          <a href="#" class="text-gray-700 hover:text-green-600 font-bold no-underline">ABOUT US</a>
        </div>

        <!-- Right Side Icons and Login -->
        <div class="hidden md:flex space-x-4 items-center">
          <!-- Search Icon -->
          <a href="#" title="Search" class="text-gray-700 hover:text-green-600 no-underline">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </a>
          <!-- Cart Icon -->
          <a href="#" title="Shopping Cart" class="text-gray-700 hover:text-green-600 no-underline relative">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.293 2.293c-.188.188-.293.442-.293.707V17h14v-1.293c0-.265-.105-.519-.293-.707L16 13" />
            </svg>
            <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
          </a>
          <a href="{{ route('login') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 font-medium no-underline transition duration-300">Login</a>
        </div>

        <!-- Mobile menu button -->
        <div class="md:hidden">
          <button id="mobile-menu-button" class="text-gray-700 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </nav>
</header>