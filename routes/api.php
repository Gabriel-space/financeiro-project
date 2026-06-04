<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\ReceitaController;

Route::apiResource('categorias',CategoriaController::class)
    ->only(['index','store','update','destroy',]);

Route::apiResource('receitas', ReceitaController::class)
    ->only(['index', 'store', 'update', 'destroy']);
