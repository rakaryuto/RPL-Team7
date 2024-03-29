<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;
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

//Landing page
Route::get('/', [MenuController::class, 'index'])->name('index');
Route::get('/home', function () { return redirect()->route('index'); })->name('home');

//Menu pages
// Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/product/{id}', [MenuController::class, 'indexProduct']);
Route::get('/checkout', [MenuController::class, 'checkout'])->name('checkout');

//Cart pages
Route::prefix('cart')->group(function() {
    Route::get('/', [CartController::class, 'indexCart'])->name('cart');
    Route::post('/add', [CartController::class, 'addCart'])->name('cart.add');
    Route::get('/edit/{id}', [CartController::class, 'indexEdit'])->name('cart.edit');
    Route::post('/edit', [CartController::class, 'editCart'])->name('cart.edit');
    Route::get('/del/{id}', [CartController::class, 'delCart'])->name('cart.del');
    Route::get('/delall', [CartController::class, 'delAllCart'])->name('cart.delall');
});

//Auth pages
Route::get('/login', [AuthController::class, 'indexLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/register', [AuthController::class, 'indexRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// User pages
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/myorders', [UserController::class, 'myOrders'])->name('myOrders');
    Route::post('/profileIdentity', [UserController::class, 'profileIdentity'])->name('profileIdentity');
    Route::post('/profileAlamat', [UserController::class, 'profileAlamat'])->name('profileAlamat');
    Route::post('/placeorder', [UserController::class, 'placeorder'])->name('placeorder');
    Route::get('/order/cancel/{id}', [UserController::class, 'cancelOrder']);
    Route::post('/order/uploadtrf', [UserController::class, 'uploadtrf'])->name('uploadtrf');
});

Route::get('/test', [CartController::class, 'test']);

// Admin
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);

    // Auth
    Route::get('/login', [AdminController::class, 'indexLogin']);
    Route::post('/login', [AdminController::class, 'login'])->name('admin.authlogin');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // Products
    Route::get('/products', [AdminController::class, 'indexProducts']);
    Route::get('/products/{id}', [AdminController::class, 'indexEditProd']);
    Route::post('/products/edit', [AdminController::class, 'editProduct'])->name('admin.editProduct');
    
    // Orders
    Route::get('/orders', [AdminController::class, 'indexOrders']);
    Route::get('/orders/{id}', [AdminController::class, 'indexEditOrder']);
    Route::post('/orders/edit', [AdminController::class, 'editOrder'])->name('admin.editOrder');
    Route::get('/orders/trf/{id}', [AdminController::class, 'getPic']);
});
