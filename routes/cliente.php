<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cliente\CarritoController;
use App\Http\Controllers\ProductoController;

route::resource('/carrito', CarritoController::class)->names('cliente.carrito')/*->middleware('can:')*/;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('/', ProductoController::class)->names('cliente.producto');
});