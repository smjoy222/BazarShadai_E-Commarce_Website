<header class="flex justify-between items-center p-4 bg-zinc-800 text-white">
  <div class="flex items-center space-x-6">
    <a href="{{route('admin-dashboard')}}">
      <h1 class="text-2xl font-bold">Admin Panel</h1>
    </a>
    <nav class="flex space-x-4">
      <a href="{{ route('admin-dashboard') }}" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-zinc-700 transition duration-200">
        Dashboard
      </a>
      <a href="{{ route('admin-product') }}" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-zinc-700 transition duration-200">
        Products
      </a>
      <a href="{{ route('admin-orders') }}" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-zinc-700 transition duration-200">
        Orders
      </a>
    </nav>
  </div>
  <div class="flex items-center">
    <p class="text-sm mr-4">Welcome, Admin</p>
    <form action="{{ route('admin.logout') }}" method="POST">
      @csrf
      <button class=" bg-green-500 px-4 py-2 text-white hover:bg-green-600 rounded-lg active:scale-[98%] transition-all shadow">Logout
      </button>
    </form>
  </div>
</header>