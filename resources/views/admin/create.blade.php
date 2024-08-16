@extends('layouts.app')
@section('title', 'Metodos de Pago')
@section('nav')
    @include('navigation-menu')
@endsection
@section('content')
    <x-authentication-card>
        <x-slot name="logo">
            <h1 class="h2">Crear Método de Pago</h1>
        </x-slot>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <form action="{{ route('payment.store') }}" method="POST">
        @csrf
        <x-label for="metodo">Método:</x-label>
        <input type="text" id="metodo" name="metodo" required>

        <x-label for="nombre_titular">Nombre del Titular:</x-label>
        <input type="text" id="nombre_titular" name="nombre_titular" required>

        <x-label for="fecha_venc">Fecha de Vencimiento:</x-label>
        <input type="date" id="fecha_venc" name="fecha_venc" required>

        <x-label for="cvv">CVV:</x-label>
        <input type="number" id="cvv" name="cvv" required>

        <x-button type="submit">Guardar</x-button>
    </form>
    </x-authentication-card>
@endsection