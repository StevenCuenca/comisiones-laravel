<?php

use App\Http\Controllers\VendedorController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ComisionController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/vendedores');

Route::resource('vendedores', VendedorController::class)
    ->only(['index', 'create', 'store']);

Route::resource('ventas', VentaController::class)
    ->only(['index', 'create', 'store']);

Route::get('/comisiones', [ComisionController::class, 'index'])
    ->name('comisiones.index');

Route::post('/comisiones/calcular', [ComisionController::class, 'calcular'])
    ->name('comisiones.calcular');