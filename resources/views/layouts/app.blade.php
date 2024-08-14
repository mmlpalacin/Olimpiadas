<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="/logo/loguito.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
       body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
       .search_bar__container { display: flex; align-items: center; width: 300px; border: 2px solid #000000; border-radius: 12px; overflow: hidden; position: relative; }
        #search-bar { flex-grow: 1; padding: 5px; border: none; border-radius: 12px 0 0 12px; }
        #search-button { border: none; background-color: transparent; height: 100%; width: 50px; cursor: pointer; position: absolute; right: 0; top: 0; border-radius: 0 12px 12px 0; }
        .search-logo { display: none; }
        #logito { display: none; }
        .cart-info { display: flex; align-items: center; color: #fff; }
        .cart-info span { margin-left: 10px; }
        .cart-info #cart-count { font-weight: bold; font-size: 1.2em; }
        .filter-container { background-color: #f4f4f4; padding: 15px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        .filter-container h2 { margin-top: 0; }
        .price-range { margin-bottom: 15px; }
        .price-range label { display: block; margin: 5px 0; }
        .price-range input { width: calc(50% - 10px); padding: 5px; margin-right: 10px; border-radius: 4px; border: 1px solid #ddd; }
        .price-range x-button { background-color: #ff6600; color: #fff; border: none; padding: 10px; border-radius: 4px; cursor: pointer; }
        .price-range x-button:hover { background-color: #e65c00; }
        .categories ul { display: flex; padding: 0; list-style: none; }
        .categories ul li { margin-bottom: 10px; margin-right: 10px; }
        .categories input[type="radio"] { margin-right: 5px; }
        .categories label { margin-right: 10px; }
        .product-list { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
        .product-item { border: 1px solid #ddd; padding: 15px; border-radius: 8px; text-align: center; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        .product-info h2 { margin: 10px 0; font-size: 18px; }
        .product-info p { margin: 5px 0; font-size: 16px; color: #666; }
        .product-item x-button { background-color: #28a745; color: #fff; border: none; padding: 10px; border-radius: 4px; cursor: pointer; margin-top: 10px; }
        .product-item x-button:hover { background-color: #218838; }

    </style>
    @livewireStyles
</head>
<body>
    <nav style="background-color: rgb(3, 53, 3); display: flex; align-items: center; justify-content: space-between;">@yield('nav')</nav>
    <div class="mt-4 ml-4">
        @yield('content')
    </div>
    @yield('scripts')
    @stack('modals')
    @livewireScripts
</body>
<br>
<footer class="text-white text-center" style="background-color: #333">
    <br>
    &copy; 2024 tec3. Todos los derechos reservados.
</footer>
</html>
