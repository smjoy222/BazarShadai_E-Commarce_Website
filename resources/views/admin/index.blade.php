<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <style>
    body {
      background: linear-gradient(135deg, #e8f5e8 0%, #f0fdf4 50%, #dcfce7 100%);
      min-height: 100vh;
    }
  </style>
  <title>Admin Login</title>
</head>

<body>
  <div class="flex items-center justify-center min-h-screen">
    <div class="bg-white p-10 rounded-xl shadow-xl w-full max-w-md">
      <h1 class="text-3xl font-extrabold text-center mb-8 text-gray-800">Admin Login</h1>
      <form action="#" method="POST">
        <div class="mb-6">
          <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
          <input type="text" id="username" name="username" required
            class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
        </div>
        <div class="mb-6">
          <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
          <input type="password" id="password" name="password" required
            class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
        </div>
        <button type="submit"
          class="w-full bg-green-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-green-700 transition duration-300 shadow-md">Login</button>
      </form>
    </div>
  </div>
</body>

</html>