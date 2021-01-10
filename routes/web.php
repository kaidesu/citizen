<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    Route::get('/avatar', [AvatarController::class, 'show'])->name('avatar.show');

    Route::post('/account', [AccountController::class, 'update'])->name('account.update');
    Route::post('/avatar', [AvatarController::class, 'update'])->name('avatar.update');
    Route::post('/personal', [PersonalController::class, 'update'])->name('personal.update');
});
