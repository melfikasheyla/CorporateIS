<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\CustomerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login/admin', [LoginController::class, 'showAdminLogin'])->name('login.admin');
Route::get('/login/user', [LoginController::class, 'showUserLogin'])->name('login.user');

Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route setelah login
Route::middleware(['auth', 'check.role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [TaskController::class, 'dashboard'])->name('dashboard');

    //  return view('admin.dashboard.index');

    Route::resource('tasks', TaskController::class);
    Route::resource('clients', CustomerController::class);
    Route::get('history', [TaskController::class, 'history'])->name('history');
});

Route::middleware(['auth', 'check.role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

    Route::get('/task', [\App\Http\Controllers\User\TaskProgressController::class, 'index'])->name('tasks.index');

    // ✅ Route form update progress
    Route::get('/task/{task}/update-progress', [\App\Http\Controllers\User\TaskProgressController::class, 'edit'])->name('task.progress.edit');

    // ✅ Route untuk submit update progress
    Route::post('/task/{task}/update-progress', [\App\Http\Controllers\User\TaskProgressController::class, 'update'])->name('task.progress.update');

    Route::get('/history', [\App\Http\Controllers\User\TaskController::class, 'index'])->name('tasks.history');
});

