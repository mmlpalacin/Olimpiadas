@extends('layouts.app')
@section('title', 'Inicio')
@section('content')
    <header>
        <div class="header-container">
            <div class="search_bar__container">
                <div class="search-logo"><i id="logito" class='bx bx-search-alt'></i></div>
                <input type="text" id="search-bar" placeholder="Buscar productos...">
            </div>
            <div class="cart-info">
                <span>Carrito:</span>
                <span id="cart-count">0</span>
            </div>
            <div class="user">
                <img class="user-img" src="user-img.webp" alt="">
            </div>
        </div>
    </header>
    <main>
        <aside>
            <div class="filter-container">
                <h2>Filtros</h2>
                <div class="price-range">
                    <label for="min-price">Precio Mínimo:</label>
                    <input type="number" id="min-price" placeholder="0">
                    <label for="max-price">Precio Máximo:</label>
                    <input type="number" id="max-price" placeholder="1000">
                    <button id="apply-filters">Aplicar Filtros</button>
                </div>
                <div class="categories">
                    <h2>Categorías</h2>
                    <ul id="category-list">
                        <!-- Las categorías se llenarán dinámicamente aquí -->
                    </ul>
                </div>
            </div>
        </aside>
        <section class="product-list">
            <!-- Los productos se llenarán dinámicamente aquí -->
        </section>
    </main>
    <script src="script.js"></script>
</body>
</html>
