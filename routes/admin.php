<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductoControllerTwo;


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

Route::get('/productos/create', function () {
    return view('index'); // Retorna la vista Blade
})->name('productos.create');

// Ruta para manejar el formulario POST
Route::get('/productos', [ProductoControllerTwo::class, 'store'])->name('productos.store');