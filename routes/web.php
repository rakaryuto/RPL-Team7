<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;
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

//Landing page
Route::view('/', 'index')->name('index');

//Menu page
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/product/{id}', [MenuController::class, 'indexProduct']);

//Cart page
Route::prefix('cart')->group(function() {
    Route::get('/', [CartController::class, 'indexCart'])->name('cart');
    Route::post('/add', [CartController::class, 'addCart'])->name('cart.add');
    Route::post('/del', [CartController::class, 'delCart'])->name('cart.del');
    Route::get('/delall', [CartController::class, 'delAllCart'])->name('cart.delall');
});

//Auth pages
Route::get('/login', [AuthController::class, 'indexLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/register', [AuthController::class, 'indexRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/test', [CartController::class, 'test']);