<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    @stack('style')

<link rel="icon" type="image/png" sizes="256x256" href="{{ asset('assets/images/logo.png') }}">
</head>

<body>
    @include('./navbar/navbar')
    @yield('main-content')
    @include('./footer/footer')

    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/dynamic-products.js') }}"></script>
    
    <!-- Set cart routes for JavaScript -->
    <script>
        window.cartRoutes = {
            add: '{{ route("cart.add") }}',
            update: '{{ route("cart.update") }}',
            remove: '{{ route("cart.remove") }}',
            count: '{{ route("cart.count") }}'
        };
    </script>
    
    <script src="{{ asset('assets/js/cart/cart.js') }}"></script>
    @stack('scripts')
</body>

</html>