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
        <script>document.addEventListener('DOMContentLoaded', () => {
    const products = [
        { id: 1, name: 'Smartphone XYZ', price: 299.99, image: 'images/product1.jpg', category: 'Electrónica' },
        { id: 2, name: 'Laptop ABC', price: 799.99, image: 'images/product2.jpg', category: 'Electrónica' },
        { id: 3, name: 'Auriculares Bluetooth', price: 59.99, image: 'images/product3.jpg', category: 'Electrónica' },
        { id: 4, name: 'Cámara Digital', price: 499.99, image: 'images/product4.jpg', category: 'Electrónica' },
        { id: 5, name: 'Chaqueta de Cuero', price: 119.99, image: 'images/product5.jpg', category: 'Ropa' },
        { id: 6, name: 'Zapatillas Deportivas', price: 89.99, image: 'images/product6.jpg', category: 'Ropa' },
        { id: 7, name: 'Reloj de Pulsera', price: 149.99, image: 'images/product7.jpg', category: 'Ropa' },
        { id: 8, name: 'Cinturón de Cuero', price: 39.99, image: 'images/product8.jpg', category: 'Ropa' },
        { id: 9, name: 'Juguete Educativo', price: 29.99, image: 'images/product9.jpg', category: 'Juguetes' },
        { id: 10, name: 'Peluche Gigante', price: 79.99, image: 'images/product10.jpg', category: 'Juguetes' },
        // Agrega más productos aquí [Ctrl + c / Ctrl + v]
    ];

    const categories = [...new Set(products.map(p => p.category))];

    const productList = document.querySelector('.product-list');
    const categoryList = document.getElementById('category-list');
    const cartCount = document.getElementById('cart-count');
    const searchBar = document.getElementById('search-bar');
    let cart = [];
    let currentCategory = '';

    function renderProducts(filteredProducts) {
        productList.innerHTML = '';
        filteredProducts.forEach(product => {
            const productElement = document.createElement('div');
            productElement.classList.add('product-item');
            productElement.innerHTML = `
                <img src="${product.image}" alt="${product.name}">
                <div class="product-info">
                    <h2>${product.name}</h2>
                    <p>$${product.price.toFixed(2)}</p>
                </div>
                <button class="add-to-cart" onclick="addToCart(${product.id})">Agregar al carrito</button>
            `;
            productList.appendChild(productElement);
        });
    }

    function renderCategories() {
        categoryList.innerHTML = '';
        categories.forEach(category => {
            const categoryElement = document.createElement('li');
            categoryElement.innerHTML = `
                <button onclick="filterByCategory('${category}')">${category}</button>
            `;
            categoryList.appendChild(categoryElement);
        });
    }

function addToCart(productId) {
        const product = products.find(p => p.id === productId);
        if (product) {
            cart.push(product);
            cartCount.textContent = cart.length;
        }
    }

    function applyFilters() {
        const minPrice = parseFloat(document.getElementById('min-price').value) || 0;
        const maxPrice = parseFloat(document.getElementById('max-price').value) || Infinity;
        const filteredProducts = products.filter(p => p.price >= minPrice && p.price <= maxPrice && (currentCategory === '' || p.category === currentCategory));
        renderProducts(filteredProducts);
    }

    function filterByCategory(category) {
        currentCategory = category;
        const filteredProducts = products.filter(p => p.category === category);
        renderProducts(filteredProducts);
    }

    function searchProducts(query) {
        const filteredProducts = products.filter(p => p.name.toLowerCase().includes(query.toLowerCase()) && (currentCategory === '' || p.category === currentCategory));
        renderProducts(filteredProducts);
    }

    document.getElementById('apply-filters').addEventListener('click', applyFilters);
    searchBar.addEventListener('input', () => searchProducts(searchBar.value));

    renderProducts(products);
    renderCategories();
});</script>
        <!-- Styles -->
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
            }

            header {
                background-color: #ff6600; /* Color naranja */
                color: #fff;
                padding: 10px;
            }

            .header-container {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .search_bar__container {
                width: 300px;
                border: 2px solid #000000;
                border-radius: 12px;
                overflow: hidden;
                position: relative; /* Necesario para que el posicionamiento absoluto funcione dentro de este contenedor */
            }

            .search-logo {
                position: absolute; /* Posiciona el logo de manera absoluta dentro del contenedor */
                right: 0; /* Alinea el logo al borde derecho */
                top: 50%; /* Centra verticalmente el logo */
                transform: translateY(-50%); /* Ajusta la posición para centrar correctamente */
                border: 1px solid #000000;
                background-color: #000000;
                height: 25px;
                width: 50px;
            }

            #logito{
                position: absolute;
                left: 20px;
                top: 5px;
                color: #ffffff;
            }

            #search-bar {
                position: relative;
                padding: 5px;
                width: 250px;
                border: none;
                overflow: hidden;
            }

            .cart-info {
                display: flex;
                align-items: center;
                color: #fff;
            }

            .cart-info span {
                margin-left: 10px;
            }

            .cart-info #cart-count {
                font-weight: bold;
                font-size: 1.2em;
            }

            .user{
                display: flex;
                height: 40px;
                width: 40px;
                border: 2px solid #f4f4f4;
                border-radius: 50%;
            }

            .user-img{
                border-radius: 50%;
            }

            /* Estilos del contenedor de filtros */
            .filter-container {
                background-color: #f4f4f4;
                padding: 15px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .filter-container h2 {
                margin-top: 0;
            }

            .price-range {
                margin-bottom: 15px;
            }

            .price-range label {
                display: block;
                margin: 5px 0;
            }

            .price-range input {
                width: calc(50% - 10px);
                padding: 5px;
                margin-right: 10px;
                border-radius: 4px;
                border: 1px solid #ddd;
            }

            .price-range button {
                background-color: #ff6600;
                color: #fff;
                border: none;
                padding: 10px;
                border-radius: 4px;
                cursor: pointer;
            }

            .price-range button:hover {
                background-color: #e65c00;
            }

            .categories ul {
                list-style: none;
                padding: 0;
            }

            .categories ul li {
                margin-bottom: 10px;
            }

            .categories button {
                background-color: #ff6600;
                color: #fff;
                border: none;
                padding: 10px;
                border-radius: 4px;
                cursor: pointer;
                width: 100%;
            }

            .categories button:hover {
                background-color: #e65c00;
            }

            /* Estilos de la lista de productos */
            .product-list {
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
                padding: 20px;
            }

            .product-item {
                background-color: #fff;
                border: 1px solid #ddd;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                width: 200px; /* Ajusta el ancho según sea necesario */
                text-align: center;
                padding: 10px;
                box-sizing: border-box;
            }

            .product-item img {
                width: 100%; /* Ajusta el ancho de la imagen al 100% del contenedor */
                height: 150px; /* Ajusta la altura fija para todas las imágenes */
                object-fit: cover; /* Asegura que la imagen cubra el área del contenedor */
                border-bottom: 1px solid #ddd;
                margin-bottom: 10px;
            }

            .product-item .product-info {
                margin-bottom: 10px;
            }

            .product-item button {
                background-color: #ff6600;
                color: #fff;
                border: none;
                padding: 10px;
                border-radius: 4px;
                cursor: pointer;
                margin-top: 10px;
            }

            .product-item button:hover {
                background-color: #e65c00;
            }


            aside {
                flex: 1;
                padding: 20px;
                max-width: 300px;
            }

            main {
                display: flex;
                justify-content: space-between;
            }

            section.product-list {
                flex: 3;
            }

        </style>
        @livewireStyles
    </head>
    <body>
            <nav style="background-color: rgb(3, 53, 3)">@yield('nav')</nav>
                <div class="mt-4 ml-4">
                    @yield('content')
                </div>
                @yield('scripts')
                @stack('modals')
                @livewireScripts
    </body>
        <footer class="border-b border-gray-100 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white text-center" style="background-color: #333">
            <br>
            &copy; 2024 tec3. Todos los derechos reservados.
        </footer>
</html>