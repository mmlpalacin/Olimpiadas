@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Carrito de Compras</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($cartItems->isEmpty())<!--no toques-->
        <p>No tienes productos en tu carrito.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item) <!--no toques-->
                    <tr>
                        <td>{{ $item->producto->nombre }}</td>
                        <td>${{ number_format($item->producto->precio, 2) }}</td>
                        <td>
                            <form action="{{ route('cliente.carrito.update', $item->id) }}" method="POST"><!--no toques-->
                                @csrf
                                @method('PUT')
                                <input type="number" name="cantidad" value="{{ $item->cantidad }}" min="1" class="form-control" style="width: 70px;">
                                <button type="submit" class="btn btn-primary btn-sm mt-1">Actualizar</button>
                            </form>
                        </td>
                        <td>${{ number_format($item->producto->precio * $item->cantidad, 2) }}</td>
                        <td>
                            <form action="{{ route('cliente.carrito.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
