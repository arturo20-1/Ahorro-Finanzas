<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

// Laravel agrega solo el prefijo /api a todas estas rutas.
// Todas las respuestas son JSON; el frontend (React) las consume.

// ---------- Públicas (con límite de intentos para frenar fuerza bruta) ----------
Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:10,1');
Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1');

// ---------- Protegidas: exigen  Authorization: Bearer <token> ----------
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/analytics', [AnalyticsController::class, 'index']);
    Route::get('/categories', [CategoryController::class, 'index']);

    // apiResource crea index, store, show, update y destroy (sin create/edit: eso son pantallas y viven en React)
    Route::apiResource('accounts', AccountController::class);
    Route::apiResource('transactions', TransactionController::class)->only(['index', 'store', 'show']);
    Route::apiResource('budgets', BudgetController::class)->except(['show']);
    Route::apiResource('goals', GoalController::class)->except(['show']);
    Route::post('/goals/{goal}/contribute', [GoalController::class, 'contribute']);

    Route::put('/profile', [ProfileController::class, 'update']);
    Route::put('/profile/password', [ProfileController::class, 'updatePassword']);
});

// ---------- Administrador: solo desde IPs permitidas y con is_admin ----------
Route::prefix('admin')->middleware('admin.ip')->group(function () {
    Route::post('/login', [AdminAuthController::class, 'login'])->middleware('throttle:5,1');

    Route::middleware(['auth:sanctum', 'admin'])->group(function () {
        Route::get('/summary', [AdminController::class, 'summary']);
        Route::get('/users', [AdminController::class, 'users']);
        Route::get('/categories', [AdminController::class, 'categories']);
        Route::post('/categories', [AdminController::class, 'storeCategory']);
    });
});
