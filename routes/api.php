<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\ReceitaController;
use App\Http\Controllers\Api\DespesaController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\RelatorioController;

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::apiResource('categorias', CategoriaController::class)
    ->only(['index', 'store', 'update', 'destroy']);

Route::apiResource('receitas', ReceitaController::class)
    ->only(['index', 'store', 'update', 'destroy']);

Route::apiResource('despesas', DespesaController::class)
    ->only(['index', 'store', 'update', 'destroy']);

Route::get('/relatorios/financeiro', [RelatorioController::class, 'financeiro']);
