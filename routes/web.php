<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('productos', ProductoController::class);

Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('productos.show');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');

Route::middleware('guest')->group(function () {
    Route::get('/login', [UsuarioController::class, 'create'])->name('login');
    Route::post('/login', [UsuarioController::class, 'store']);
    
    Route::get('/register', [UsuarioController::class, 'create'])->name('register');
    Route::post('/register', [UsuarioController::class, 'store']);
});

Route::post('/logout', [UsuarioController::class, 'destroy'])->name('logout');