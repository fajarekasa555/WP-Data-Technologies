<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dev\RbacController;


Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Halaman Dev Mode RBAC
Route::prefix('dev/rbac')->middleware(['auth', 'dev'])->group(function () {

    Route::get('/', [RbacController::class, 'index'])->name('dev.rbac.index');

    // Generate semua permission & menu otomatis
    Route::post('/generate', [RbacController::class, 'generate'])->name('dev.rbac.generate');

    // Roles
    Route::post('/role/store', [RbacController::class, 'storeRole'])->name('dev.rbac.role.store');
    Route::post('/role/update', [RbacController::class, 'updateRole'])->name('dev.rbac.role.update');
    Route::post('/role/delete', [RbacController::class, 'deleteRole'])->name('dev.rbac.role.delete');

    // Menus
    Route::post('/menu/store', [RbacController::class, 'storeMenu'])->name('dev.rbac.menu.store');
    Route::post('/menu/update', [RbacController::class, 'updateMenu'])->name('dev.rbac.menu.update');
    Route::post('/menu/delete', [RbacController::class, 'deleteMenu'])->name('dev.rbac.menu.delete');

    // AJAX search roles / permissions
    Route::get('/search', [RbacController::class, 'search'])->name('dev.rbac.search');
});