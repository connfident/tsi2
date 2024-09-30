<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return redirect()->route('home'); // Redirigir a la ruta de home
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('productos', ProductoController::class);


Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('productos.show');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');


Route::middleware('guest')->group(function () {
    Route::get('/login', [UsuarioController::class, 'mostrarLogin'])->name('login'); // Cambiado a showLoginForm
    Route::post('/login', [UsuarioController::class, 'login']);
    
    Route::get('/registrar', [UsuarioController::class, 'create'])->name('registrar');
    Route::post('/registrar', [UsuarioController::class, 'store'])->name('registrar.store');
});

// Ruta para ver un usuario específico
Route::get('/usuarios/{id}', [UsuarioController::class, 'show'])->name('usuarios.show');

// Rutas protegidas para usuarios autenticados
Route::middleware('auth')->group(function () {
    Route::post('/logout', [UsuarioController::class, 'logout'])->name('logout');
});