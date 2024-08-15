@extends('layouts.app')
@section('title', 'Lista de Usuarios')
@section('nav')
    @include('navigation-menu')
@endsection
@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @livewire('users-index')
@endsection