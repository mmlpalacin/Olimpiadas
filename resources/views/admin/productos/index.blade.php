@extends('layouts.app')
@section('title', 'Productos')
@section('nav')
    @include('navigation-menu')
@endsection
@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="h1">Productos</h1>
    <a href="{{ route('productos.create') }}"><x-button> Agregar Producto</x-button></a>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th colspan="2"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                    <td>{{$producto->nombre}}</td>
                    <td>{{$producto->descripcion}}</td>
                    <td width="10px"><a class="btn btn-primary mr-2" href="{{route('productos.edit', $producto)}}">editar</a></td>
                    <td width="10px">
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar el producto {{ $producto->nombre }}?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ml-2">Eliminar</button>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection