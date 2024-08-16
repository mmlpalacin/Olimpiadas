@extends('layouts.app')
@section('title', 'inicio')
@section('nav')
    @if (Route::has('login'))
        @auth
            @include('navigation-menu')
        @else
            <a class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]" href="{{ route('login') }}"> Ingresar </a>

            @if (Route::has('register'))
                <a class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]" href="{{ route('register') }}"> Registrarse </a>
            @endif
        @endauth
    @endif
@endsection

@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form method="GET" action="{{ route('cliente.productos.index') }}" class="filter-container">
        <aside>
            <h2>Filtros</h2>
            <div class="price-range">
                <label for="min-price">Precio Mínimo:</label>
                <input type="number" name="min_price" placeholder="0">
                <label for="max-price">Precio Máximo:</label>
                <input type="number" name="max_price" placeholder="1000">
            </div>
            <div class="categories">
            <h3>Categorías</h3>
            <ul>
                @foreach ($categories as $category)
                    <li>
                        <input type="radio" name="category" value="{{ $category->id }}" {{ request('category') == $category->id ? 'checked' : '' }}>
                        <label for="category_{{ $category->id }}">{{ $category->nombre }}</label>
                    </li>
                @endforeach
            </ul>
            </div>
        </aside>
        <x-button type="submit">Aplicar filtros</x-button>
    </form>

    <section class="product-list">
        @if ($products->isNotEmpty())
            @foreach($products as $product)
                <div class="product-item">
                    <div class="product-info">
                        <h2>{{ $product['nombre'] }}</h2>
                        <p>Precio: ${{ $product['precio'] }}</p>
                        <form method="POST" action="{{ route('cliente.carrito.store') }}">
                            @csrf
                            <input type="hidden" name="producto_id" value="{{ $product->id }}">
                            <input type="number" name="cantidad" value="1" min="1" step="1">
                            <x-button type="submit">Añadir al carrito</x-button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            No se encontraron productos
        @endif       
    </section>
@endsection