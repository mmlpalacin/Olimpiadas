@extends('layouts.app')
@section('title', 'Lista de Usuarios')

@section('content')
    @if (session('info'))
        <div class="alert">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    @livewire('users-index')
@endsection