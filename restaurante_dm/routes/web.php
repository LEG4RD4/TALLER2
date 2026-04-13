<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\BuzonController;

Route::get('/', [ProductoController::class, 'index'])->name('inicio');
Route::get('/nosotros', [ProductoController::class, 'nosotros'])->name('nosotros');
Route::get('/menu', [ProductoController::class, 'menu'])->name('menu');
Route::get('/pedidos', [ProductoController::class, 'pedidos'])->name('pedido.index');
Route::post('/pedidos/guardar', [ProductoController::class, 'store'])->name('producto.store');
Route::post('/agregar-al-pedido', [ProductoController::class, 'agregarAlPedido'])->name('agregar.pedido');
Route::get('/central-mensajes', [BuzonController::class, 'index'])->name('buzon.index');
Route::post('/enviar-pqrs', [BuzonController::class, 'store'])->name('pqrs.store');