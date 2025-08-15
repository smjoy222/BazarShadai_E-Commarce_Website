@extends('index')
@push('style')
<title>About Us - Bazar Shadai</title>
@endpush
@section('main-content')

<!-- About Hero Section -->
<section class="bg-green-50 py-16">
 <div class="container max-w-5xl mx-auto px-4 text-center">
  <h1 class="text-4xl md:text-5xl font-bold text-green-700 mb-4">About <span class="text-green-900">Bazar Shadai</span></h1>
  <p class="text-lg text-gray-700 max-w-2xl mx-auto mb-6">Bazar Shadai is your trusted online marketplace for fresh, organic groceries and daily essentials. We are committed to delivering quality products straight to your doorstep, making healthy living easy and convenient for everyone.</p>
  <img src="{{ asset('assets/images/logo.png') }}" alt="About Bazar Shadai" class="mx-auto rounded-2xl shadow-lg max-h-72 object-contain">
 </div>
</section>

<!-- Company Info Section -->
<section class="py-16 bg-white">
 <div class="container max-w-5xl mx-auto px-4">
  <div class="grid md:grid-cols-2 gap-12 items-center">
   <div>
    <h2 class="text-2xl font-bold text-green-700 mb-4">Our Mission</h2>
    <p class="text-gray-700 mb-4">To provide the freshest, healthiest, and most affordable groceries to our community, while supporting local farmers and sustainable practices.</p>
    <h2 class="text-2xl font-bold text-green-700 mb-4 mt-8">Why Choose Us?</h2>
    <ul class="list-disc list-inside text-gray-700 space-y-2">
     <li>Wide selection of organic and fresh products</li>
     <li>Fast and free home delivery</li>
     <li>Easy and secure payment options</li>
     <li>Friendly customer support</li>
    </ul>
   </div>
  </div>
 </div>
</section>

<!-- Team Section (Optional) -->
<section class="py-16 bg-green-50">
 <div class="container max-w-5xl mx-auto px-4">
  <h2 class="text-2xl font-bold text-green-700 mb-8 text-center">Meet Our Team</h2>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
   <div class="bg-white rounded-2xl shadow-md p-6 flex flex-col items-center">
    <img src="{{ asset('assets/images/about/team1.jpg') }}" alt="Team Member 1" class="w-20 h-20 rounded-full mb-4 object-cover">
    <h3 class="text-lg font-bold text-gray-800 mb-1">Sazzad Mahmud Joy</h3>
    <p class="text-green-600 font-medium mb-2">221-15-5777</p>
    <p class="text-gray-500 text-center">Department Of CSE</p>
   </div>
   <div class="bg-white rounded-2xl shadow-md p-6 flex flex-col items-center">
    <img src="{{ asset('assets/images/about/team2.jpg') }}" alt="Team Member 2" class="w-20 h-20 rounded-full mb-4 object-cover">
    <h3 class="text-lg font-bold text-gray-800 mb-1">Anika Afrin Moumeta</h3>
    <p class="text-green-600 font-medium mb-2">221-15-5142</p>
    <p class="text-gray-500 text-center">Department Of CSE</p>
   </div>
   <div class="bg-white rounded-2xl shadow-md p-6 flex flex-col items-center">
    <img src="{{ asset('assets/images/about/team3.png') }}" alt="Team Member 3" class="w-20 h-20 rounded-full mb-4 object-cover">
    <h3 class="text-lg font-bold text-gray-800 mb-1">Md. Whahidul Islam Payel</h3>
    <p class="text-green-600 font-medium mb-2">221-15-5106</p>
    <p class="text-gray-500 text-center">Department Of CSE</p>
   </div>
  </div>
 </div>
</section>

@endsection