@extends('layouts.app')
@section('title', 'Inicio')
@section('content')
    <header>
        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
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
