<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

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

// routes/web.php
Route::get('/', [ContactController::class, 'index'])->name('index');
Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm');
Route::post('/contacts', [ContactController::class, 'store'])->name('store');
Route::get('/thanks', [ContactController::class, 'thanks'])->name('thanks');

Route::post('/register/submit', [AuthController::class, 'register'])
    ->name('register.submit');

Route::post('/login/submit', [AuthController::class, 'login'])
    ->name('login.submit');

Route::middleware('auth')
    ->name('admin.')
    ->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('index');
        Route::post('/search', [AdminController::class, 'search'])->name('search');
        Route::post('/reset',  [AdminController::class, 'reset'])->name('reset');
        Route::get('/export',  [AdminController::class, 'export'])->name('export');
        Route::get('/admin/{contact}', [AdminController::class, 'show'])->name('show');
    });
