<?php

use App\Http\Controllers\Api\AccountController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BudgetController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\GoalController;
use App\Http\Controllers\Api\TransactionController;
use Illuminate\Support\Facades\Route;

// Laravel agrega solo el prefijo /api a todas estas rutas.

// ---------- Públicas (con límite de intentos para frenar fuerza bruta) ----------
Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:10,1');
Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:6,1');

// ---------- Protegidas: exigen  Authorization: Bearer <token> ----------
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // apiResource crea index, store, show, update y destroy (sin create/edit, que son pantallas web)
    Route::apiResource('accounts', AccountController::class);
    Route::apiResource('transactions', TransactionController::class)->only(['index', 'store', 'show']);

    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/budgets', [BudgetController::class, 'index']);
    Route::get('/goals', [GoalController::class, 'index']);
});
