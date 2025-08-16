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
              <a href="{{ route('products', 'vegetable') }}" class="dropdown-item">
                <div class="flex items-center">
                  VEGETABLES
                </div>
              </a>
              <a href="{{ route('products', 'fruits') }}" class="dropdown-item">
                <div class="flex items-center">
                  FRUITS
                </div>
              </a>
              <a href="{{ route('products', 'meats') }}" class="dropdown-item">
                <div class="flex items-center">
                  MEATS
                </div>
              </a>
              <a href="{{ route('products', 'fish') }}" class="dropdown-item">
                <div class="flex items-center">
                  FISH
                </div>
              </a>
              <a href="{{ route('products', 'seafood') }}" class="dropdown-item">
                <div class="flex items-center">
                  SEA FOOD
                </div>
              </a>
              <a href="{{ route('products', 'dairy') }}" class="dropdown-item">
                <div class="flex items-center">
                  DAIRY
                </div>
              </a>
            </div>
          </div>

          <a href="{{ url('/about') }}" class="text-gray-700 hover:text-green-600 font-bold no-underline">ABOUT US</a>
        </div>

        <!-- Right Side Icons and Login/Profile -->
        <div class="hidden md:flex space-x-4 items-center">
          <!-- Search Icon -->
          <a href="#" title="Search" class="text-gray-700 hover:text-green-600 no-underline">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </a>
          <!-- Cart Icon -->
          <a href="{{ route('cart.view') }}" title="Shopping Cart" class="text-gray-700 hover:text-green-600 no-underline relative">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.293 2.293c-.188.188-.293.442-.293.707V17h14v-1.293c0-.265-.105-.519-.293-.707L16 13" />
            </svg>
            @auth('web')
            <span class="cart-badge absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">{{ Auth::guard('web')->user()->cart_count }}</span>
            @else
            <span class="cart-badge absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
            @endauth
          </a>

          @auth('web')
          <!-- Profile Dropdown -->
          <div class="profile-dropdown relative">
            <button class="profile-toggle flex items-center space-x-2 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
              <span class="font-medium">{{ Auth::guard('web')->user()->name }}</span>
              <svg class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="profile-menu absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-2 z-50 hidden">
              <a href="{{ route('user.home') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 transition duration-200">
                <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Dashboard
              </a>
              <a href="{{ route('user.profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 transition duration-200">
                <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                Profile
              </a>
              <a href="{{ route('user.orders') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 transition duration-200">
                <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                My Orders
              </a>
              <a href="{{ route('user.settings') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 transition duration-200">
                <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Settings
              </a>
              <div class="border-t border-gray-200 my-2"></div>
              <a href="{{ route('logout') }}" class="block px-4 py-2 text-red-600 hover:bg-red-50 transition duration-200">
                <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Logout
              </a>
            </div>
          </div>
          @else
          <!-- Login Button -->
          <a href="{{ route('login.form') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 font-medium no-underline transition duration-300">Login</a>
          @endauth
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
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden bg-white border-t border-gray-200 px-4 pt-4 pb-6">
      <a href="{{ route('home') }}" class="block py-2 text-gray-700 hover:text-green-600 font-bold no-underline">HOME</a>
      <div class="border-t my-2"></div>
      <div class="dropdown">
        <button class="dropdown-toggle w-full text-left py-2 text-gray-700 hover:text-green-600 font-bold flex items-center">
          SHOP
          <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>
        <div class="dropdown-menu hidden bg-white border rounded-lg mt-1">
          <a href="{{ route('products', 'vegetable') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600">VEGETABLES</a>
          <a href="{{ route('products', 'fruits') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600">FRUITS</a>
          <a href="{{ route('products', 'meats') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600">MEATS</a>
          <a href="{{ route('products', 'fish') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600">FISH</a>
          <a href="{{ route('products', 'seafood') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600">SEA FOOD</a>
          <a href="{{ route('products', 'dairy') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600">DAIRY</a>
        </div>
      </div>
      <a href="{{ url('/about') }}" class="block py-2 text-gray-700 hover:text-green-600 font-bold no-underline">ABOUT US</a>
      <div class="border-t my-2"></div>
      <a href="{{ route('cart.view') }}" class="block py-2 text-gray-700 hover:text-green-600 font-bold no-underline">CART</a>
      @auth('web')
      <a href="{{ route('user.home') }}" class="block py-2 text-gray-700 hover:text-green-600 font-bold no-underline">Dashboard</a>
      <a href="{{ route('user.profile') }}" class="block py-2 text-gray-700 hover:text-green-600 font-bold no-underline">Profile</a>
      <a href="{{ route('user.orders') }}" class="block py-2 text-gray-700 hover:text-green-600 font-bold no-underline">My Orders</a>
      <a href="{{ route('user.settings') }}" class="block py-2 text-gray-700 hover:text-green-600 font-bold no-underline">Settings</a>
      <a href="{{ route('logout') }}" class="block py-2 text-red-600 hover:bg-red-50 font-bold no-underline">Logout</a>
      @else
      <a href="{{ route('login.form') }}" class="block py-2 text-gray-700 hover:text-green-600 font-bold no-underline">Login</a>
      @endauth
    </div>
  </nav>
</header>