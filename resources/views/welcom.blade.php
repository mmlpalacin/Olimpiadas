@extends('layouts.app')
@section('title', 'inicio')
@section('nav')
    @if (Route::has('login'))
        @auth
            @include('navigation-menu')
        @else
            <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"> Log in </a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"> Register </a>
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
        <h2>Filtros</h2>
        <div class="price-range">
            <label>Precio mínimo:</label>
            <input type="number" name="min_price" placeholder="0" step="0.01" value="{{ request('min_price') }}">
            <label for="max-price">Precio máximo:</label>
            <input type="number" name="max_price" placeholder="1000" step="0.01" value="{{ request('max_price') }}">
        </div>
        <div class="categories">
            <h3>Categorías</h3>
            <ul>
                @foreach ($categories as $category)
                    <li>
                        <input type="radio" id="category-{{ $category->id }}" name="category" value="{{ $category->id }}" {{ request('category') == $category->id ? 'checked' : '' }}>
                        <label for="category-{{ $category->id }}">{{ $category->nombre }}</label>
                    </li>
                @endforeach
            </ul>
        </div>
        <x-button type="submit">Aplicar filtros</x-button>
    </form>

    <div class="product-list">
        @if ($products->isNotEmpty())
            @foreach($products as $product)
                <div class="product-item">
                    <!--<img src="{{ $product['image'] }}" alt="{{ $product['nombre'] }}">-->
                    <div class="product-info">
                        <h2>{{ $product['nombre'] }}</h2>
                        <p>Precio: ${{ $product['precio'] }}</p>
                        <form method="POST" action="{{ route('cliente.carrito.store') }}">
                            @csrf
                            <input type="hidden" name="producto_id" value="{{ $product->id }}">
                            <x-input type="number" name="cantidad" value="1" min="1" step="1"></x-input>
                            <x-button type="submit" class="add-to-cart">Añadir al carrito</x-button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            No se encontraron productos
        @endif       
    </div>
@endsection