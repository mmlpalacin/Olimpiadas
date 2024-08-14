@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Carrito de Compras</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <ul>
        @foreach(json_decode($cart->productos ?? '{}', true) as $productoId => $cantidad)
            <li>Producto ID: {{ $productoId }} - Cantidad: {{ $cantidad }}</li>
        @endforeach
    </ul>

    
</div>
@endsection