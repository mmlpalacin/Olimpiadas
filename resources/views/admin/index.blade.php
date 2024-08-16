@extends('layouts.app')
@section('title', 'Pago')
@section('nav')
    @include('navigation-menu')
@endsection
@section('content')
@if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="h2">Métodos de Pago</h1>
    <a href="{{ route('payment.create') }}"><x-button> Agregar Método de Pago</x-button></a>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Metodo</th>
                    <th>Descripcion</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paymentMethods as $method)
                    <tr>
                        <td>{{ $method->Metodo }}</td>
                        <td>{{ $method->descripcion }}</td>
                        <td width="10px">
                            <form action="{{ route('payment.destroy', $method->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar el producto {{ $method->Metodo }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ml-2">Eliminar</button>
                            </form>
                        </td>
                        </tr>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection