<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - BazarShadai</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #e8f5e8 0%, #f0fdf4 50%, #dcfce7 100%);
            min-height: 100vh;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">
    <div class="w-full max-w-md">
        <!-- Header Section -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-green-700 mb-2">Forgot Password?</h1>
            <p class="text-gray-600">Reset your BazarShadai account password</p>
        </div>

        <!-- Forgot Password Form Card -->
        <div class="bg-white rounded-2xl shadow-xl p-8 relative">
            <!-- Close Button -->
            <button onclick="window.history.back()" class="absolute top-4 right-4 w-8 h-8 bg-gray-100 hover:bg-gray-200 rounded-full flex items-center justify-center transition-colors">
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <!-- Reset Password Icon -->
            <div class="flex justify-center mb-6">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
            </div>

            <h2 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Reset Password</h2>
            
            <!-- Description -->
            <div class="mb-6 text-center">
                <p class="text-sm text-gray-600 leading-relaxed">
                    Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                </p>
            </div>


            <form method="#" action="#" class="space-y-6">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                            </svg>
                        </div>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                               class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none transition-all bg-gray-50 focus:bg-white"
                               placeholder="Enter your email address">
                    </div>
                </div>

                <!-- Reset Password Button -->
                <button type="submit" 
                        class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                    Send Password Reset Link
                </button>

                <!-- Back to Login Link -->
                <div class="text-center pt-4">
                    <p class="text-gray-600">
                        Remember your password? 
                        <a href="{{ route('login') }}" class="text-green-600 hover:text-green-700 font-medium">Back to Login</a>
                    </p>
                </div>
            </form>

            <!-- Help Section -->
            <div class="text-center mt-6 pt-6 border-t border-gray-100">
                <p class="text-xs text-gray-500">
                    Need help? Contact our 
                    <a href="#" class="text-green-600 hover:underline">Support Team</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
