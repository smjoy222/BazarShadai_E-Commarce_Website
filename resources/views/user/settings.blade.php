@extends('index')
@push('style')
<title>Settings - BazarShadai</title>
@endpush
@section('main-content')

<div class="container mx-auto px-6 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Account Settings</h1>
            <p class="text-gray-600 mt-2">Manage your account preferences and security settings</p>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error Messages -->
        @if($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Settings Content -->
        <div class="space-y-6">
            <!-- Security Settings -->
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Security Settings</h3>
                
                <!-- Change Password Form -->
                <form action="{{ route('user.update-password') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div class="flex-1">
                            <p class="font-medium text-gray-800">Password</p>
                            <p class="text-sm text-gray-600">Last changed on {{ $user->updated_at->format('M d, Y') }}</p>
                        </div>
                        <button type="button" onclick="togglePasswordForm()" class="text-green-600 hover:text-green-700 font-medium">
                            Change
                        </button>
                    </div>
                    
                    <!-- Password Change Form (Initially Hidden) -->
                    <div id="passwordForm" class="hidden space-y-4 p-4 bg-gray-50 rounded-lg">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                            <input type="password" name="current_password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                            <input type="password" name="new_password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                            <input type="password" name="new_password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                        </div>
                        <div class="flex space-x-4">
                            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                                Update Password
                            </button>
                            <button type="button" onclick="togglePasswordForm()" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition duration-300">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Notification Preferences -->
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Notification Preferences</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-medium text-gray-800">Email Notifications</p>
                            <p class="text-sm text-gray-600">Receive order updates and promotions</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" value="" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600"></div>
                        </label>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-medium text-gray-800">SMS Notifications</p>
                            <p class="text-sm text-gray-600">Get delivery updates via SMS</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" value="" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600"></div>
                        </label>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-medium text-gray-800">Marketing Emails</p>
                            <p class="text-sm text-gray-600">Receive promotional offers and deals</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" value="" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600"></div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Danger Zone -->
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-red-200">
                <h3 class="text-lg font-semibold text-red-600 mb-4">Danger Zone</h3>
                <div class="space-y-4">
                    <!-- Delete Account Form -->
                    <form action="{{ route('user.delete-account') }}" method="POST" onsubmit="return confirmDelete()">
                        @csrf
                        <div class="flex items-center justify-between p-4 bg-red-50 rounded-lg">
                            <div class="flex-1">
                                <p class="font-medium text-gray-800">Delete Account</p>
                                <p class="text-sm text-gray-600">Permanently delete your account and all data</p>
                            </div>
                            <button type="button" onclick="toggleDeleteForm()" class="text-red-600 hover:text-red-700 font-medium">
                                Delete
                            </button>
                        </div>
                        
                        <!-- Delete Account Form (Initially Hidden) -->
                        <div id="deleteForm" class="hidden space-y-4 p-4 bg-red-50 rounded-lg mt-4">
                            <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg">
                                <p class="font-medium">⚠️ Warning: This action cannot be undone!</p>
                                <p class="text-sm">All your data will be permanently deleted.</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Confirm your password to delete account</label>
                                <input type="password" name="confirm_password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" required>
                            </div>
                            <div class="flex space-x-4">
                                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition duration-300">
                                    Delete Account
                                </button>
                                <button type="button" onclick="toggleDeleteForm()" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition duration-300">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Back Button -->
            <div class="flex justify-center">
                <a href="{{ route('user.home') }}" class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition duration-300">
                    Back to Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function togglePasswordForm() {
    const form = document.getElementById('passwordForm');
    form.classList.toggle('hidden');
}

function toggleDeleteForm() {
    const form = document.getElementById('deleteForm');
    form.classList.toggle('hidden');
}

function confirmDelete() {
    return confirm('Are you absolutely sure you want to delete your account? This action cannot be undone and all your data will be permanently lost.');
}
</script>
@endpush

@endsection
