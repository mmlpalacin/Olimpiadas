@extends('layouts.app')
@section('title', 'Envio')
@section('nav')
    @include('navigation-menu')
@endsection
@section('content')
    <h1 class="h1">Envio</h1>
    <form action="{{route('envio.store')}}" method="post">
    @csrf
        <label for="pais">País:</label>
        <input type="text" id="pais" name="pais" required>

        <label for="codigo_postal">Código Postal:</label>
        <input type="text" id="codigo_postal" name="codigo_postal" required>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required>

        <x-button type="submit">Siguiente</x-button>
    </form>
@endsection