<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/transacciones', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/presupuestos', [BudgetController::class, 'index'])->name('budgets.index');
Route::get('/metas', [GoalController::class, 'index'])->name('goals.index');
Route::get('/reportes', [AnalyticsController::class, 'index'])->name('analytics.index');
Route::get('/cuentas', [AccountController::class, 'index'])->name('accounts.index');
Route::get('/configuracion', [SettingsController::class, 'index'])->name('settings.index');

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/categorias', fn () => back())->name('admin.categories.store');
});