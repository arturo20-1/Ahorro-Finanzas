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
use App\Http\Middleware\EnsureAdmin;
use App\Http\Middleware\RestrictAdminIp;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    // throttle:5,1 = máximo 5 intentos por minuto desde la misma IP (frena la fuerza bruta)
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1')->name('login.store');
    Route::post('/registro', [AuthController::class, 'register'])->middleware('throttle:10,1')->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/transacciones', [TransactionController::class, 'index'])->name('transactions.index');
    Route::post('/transacciones', [TransactionController::class, 'store'])->name('transactions.store');
    Route::get('/presupuestos', [BudgetController::class, 'index'])->name('budgets.index');
    Route::get('/metas', [GoalController::class, 'index'])->name('goals.index');
    Route::get('/reportes', [AnalyticsController::class, 'index'])->name('analytics.index');
    // Route::resource crea de una vez index, store, update y destroy de cuentas:
    //   GET /cuentas, POST /cuentas, PUT /cuentas/{account}, DELETE /cuentas/{account}
    // con los nombres accounts.index, accounts.store, accounts.update y accounts.destroy
    Route::resource('cuentas', AccountController::class)
        ->only(['index', 'store', 'update', 'destroy'])
        ->parameters(['cuentas' => 'account'])
        ->names('accounts');
    Route::get('/configuracion', [SettingsController::class, 'index'])->name('settings.index');
});

// ---------- Administrador: usuario con permiso is_admin, solo desde IPs permitidas ----------
Route::prefix('admin')->name('admin.')->middleware(RestrictAdminIp::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->middleware('throttle:5,1')->name('login.store');
    });

    Route::middleware(['auth', EnsureAdmin::class])->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::post('/categorias', [AdminController::class, 'storeCategory'])->name('categories.store');
    });
});
