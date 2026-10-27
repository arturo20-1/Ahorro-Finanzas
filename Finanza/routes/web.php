<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TransactionController;
use App\Http\Middleware\RestrictAdminIp;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

// ---------- Clientes ----------
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::post('/registro', [AuthController::class, 'register'])->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/transacciones', [TransactionController::class, 'index'])->name('transactions.index');
    Route::post('/transacciones', [TransactionController::class, 'store'])->name('transactions.store');
    Route::get('/presupuestos', [BudgetController::class, 'index'])->name('budgets.index');
    Route::get('/metas', [GoalController::class, 'index'])->name('goals.index');
    Route::get('/reportes', [AnalyticsController::class, 'index'])->name('analytics.index');
    Route::get('/cuentas', [AccountController::class, 'index'])->name('accounts.index');
    Route::post('/cuentas', [AccountController::class, 'store'])->name('accounts.store');
    Route::put('/cuentas/{account}', [AccountController::class, 'update'])->name('accounts.update');
    Route::delete('/cuentas/{account}', [AccountController::class, 'destroy'])->name('accounts.destroy');
    Route::get('/configuracion', [SettingsController::class, 'index'])->name('settings.index');
});

// ---------- Administrador (guard "admin" + solo desde IPs permitidas) ----------
Route::prefix('admin')->name('admin.')->middleware(RestrictAdminIp::class)->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.store');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::post('/categorias', fn () => back())->name('categories.store');
    });
});
