<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cliente\CarritoController;

route::resource('/carrito', CarritoController::class)->names('cliente.carrito');
