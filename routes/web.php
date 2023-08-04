<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('main');

Route::get('/detail/{id}', [PostController::class, 'show'])->name('detail');


//Auth
Auth::routes();

Route::get('/home', [App\Http\Controllers\LoginController::class, 'index'])->name('home');

Route::get('/search', [HomeController::class, 'search'])->name('search');

