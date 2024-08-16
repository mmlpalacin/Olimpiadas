<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductoControllerTwo;
use App\Http\Controllers\Admin\PaymentMethodController;

route::resource('/admin/users', UserController::class)->names('admin.users')->middleware('can:admin.users.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('/productos', ProductoControllerTwo::class)->names('productos')->middleware('can:productos.index');

Route::resource('/payment-methods', PaymentMethodController::class)->names('payment')->middleware('can:payment.index');
