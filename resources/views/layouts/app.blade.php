<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="/logo/loguito.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
       body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
       #search-bar{color: black;}
        .cart-info { display: flex; align-items: center; color: #fff; }
        .cart-info span { margin-left: 10px; }
        .cart-info #cart-count { font-weight: bold; font-size: 1.2em; }
        .filter-container { background-color: #f4f4f4; padding: 15px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        .filter-container h2 { margin-top: 0; }
        .price-range { margin-bottom: 15px; display: flex; }
        .price-range label { margin: 5px 0; }
        .price-range input { width: calc(50% - 10px); padding: 5px; margin-right: 10px; border-radius: 4px; border: 1px solid #ddd; }
        .categories ul { display: flex; padding: 0; list-style: none; }
        .categories ul li { margin-bottom: 10px; margin-right: 10px; }
        .categories input[type="radio"] { margin-right: 5px; }
        .categories label { margin-right: 10px; }
        .product-list { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; text-align: center; }
        .product-list h2 { margin-bottom: 20px; }
        .product-item { display: flex; flex-direction: column; align-items: center; padding: 20px; margin-top: 20px; background-color: #fff; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); }
        .product-item img { width: 100px; height: auto; margin-bottom: 10px; }
        .product-info { margin-bottom: 10px; }
        .product-info h2 { margin: 10px 0; font-size: 18px; }
        .product-info p { margin: 5px 0; font-size: 16px; color: #666; }
        .info-button { background-color: #0070f3; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; font-size: 16px; margin-top: 10px; }
        .info-button:hover { background-color: #005bb5; }
        .container { display: flex; background-color: #e1e1e1; border-radius: 20px; justify-content: space-between; width: 100%; max-width: 1300px; padding: 30px; box-sizing: border-box; box-shadow: 0 10px 10px #d3d3d3; }
        .container { display: flex; background-color: #e1e1e1; border-radius: 20px; justify-content: space-between; width: 100%; max-width: 1300px; padding: 30px; box-sizing: border-box; box-shadow: 0 10px 10px #d3d3d3; }
.form-container, .product-preview { background-color: #fff; border-radius: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); display: flex; flex-direction: column; }
.form-container { padding: 20px; width: 100%; max-width: 500px; margin-right: 20px; box-sizing: border-box; }
.product-preview { width: 100%; max-width: 600px; height: auto; box-sizing: border-box; padding: 20px; }
.product-advice { margin-bottom: 20px; text-align: center; }
.product-advice p { font-size: 18px; font-weight: bold; color: #333; margin: 0; }

label { display: block; margin-bottom: 4px; font-weight: bold; font-size: 14px; }
        input[type="text"], input[type="number"], select { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 10px; }
        .button-container { display: flex; flex-direction: column; align-items: center; margin-top: 10px; }
        .agregar-img { border: 1px solid #666; border-radius: 10px; box-shadow: 0 0 10px #666; padding: 10px; }
        button { width: 100%; padding: 10px; border: none; border-radius: 20px; font-size: 16px; cursor: pointer; margin-top: 10px; box-sizing: border-box; }
        .submit-button { border: 1px solid #f06000; background-color: #ff7e29; }
        .submit-button:hover { background-color: #f06000; }
        .clear-button { border: 1px solid #c82333; background-color: #dc3545; }
        .clear-button:hover { background-color: #c82333; }
        .contenedor__caracteristicas, .contenedor__descripcion { margin-bottom: 20px; padding: 20px; border: 1px solid #d8d8d8; border-radius: 8px; box-shadow: 0 10px 8px #c3c3c3; font-family: Arial, sans-serif; }
        .caracteristicas__titulo { font-size: 18px; font-weight: bold; margin-bottom: 15px; color: #333; }
        .caracteristicas__lista { list-style-type: none; padding: 0; margin: 0; }
        .caracteristica__item { margin-bottom: 10px; display: flex; justify-content: space-between; border-bottom: 1px solid #e6e6e6; padding-bottom: 5px; }
        .caracteristica__item span { font-weight: bold; color: #666; }
        .titulo_producto { font-size: 28px; font-weight: bold; margin-bottom: 10px; }
        .precio_producto { font-size: 24px; font-weight: bold; color: #28a745; margin-bottom: 10px; }
        .descripcion__titulo { font-size: 22px; font-weight: bold; margin-bottom: 15px; }
        .descripcion__detalles { line-height: 1.5; }
        .product-advice { margin-bottom: 20px; text-align: center; }
        .product-advice p { font-size: 18px; font-weight: bold; color: #333; margin: 0; }
        .payment-code { display: none; margin-top: 20px; padding: 10px; background-color: #dff0d8; border: 1px solid #d6e9c6; border-radius: 4px; }
        .error-message { color: red; margin-top: 10px; display: none; }
        @media (max-width: 768px) {
            .product-item { padding: 15px; margin-top: 15px; }
            .product-item img { width: 80px; }
            .info-button { padding: 8px 16px; font-size: 14px; }
        }
        @media (max-width: 480px) {
            .product-item { padding: 10px; margin-top: 10px; }
            .product-item img { width: 60px; }
            .info-button { padding: 6px 12px; font-size: 12px; }
        }
    </style>
    @livewireStyles
</head>
<body>
    <nav style="background-color: #ff6600; display: flex;  color: #fff; align-items: center; justify-content: space-between;">@yield('nav')</nav>
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
