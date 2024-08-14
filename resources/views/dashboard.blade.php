@extends('layouts.app')
@section('title', 'inicio')
@section('nav')
    @include('navigation-menu')
@endsection
@section('content')
    <div class="container d-flex flex-column justify-content-center align-items-center">
        @if (Auth::user()->profile_photo_path)
            <div class="shrink-0 me-3">
                <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}" />
            </div>     
        @else
            <div class="shrink-0 me-3">
                <img class="h-10 w-10 rounded-full object-cover" src="data:image/png;base64,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" alt="{{ Auth::user()->name }}" />
            </div>    
        @endif

        <div>
            <div class="font-medium text-2xl text-center text-gray-800">{{ Auth::user()->name }}</div>
            <div class="font-medium  text-xl  text-center text-gray-500">{{ Auth::user()->email }}</div>
            <x-section-border />
        </div>
        <br>
@endsection