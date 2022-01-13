<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('login');
Route::get('/signup', function () {
    return view('signup');
})->name('signup');
Route::post('signMeUp', [App\Http\Controllers\UserController::class, 'store'])->name('signMeUp');
Route::post('/postLogin', [App\Http\Controllers\LoginController::class, 'postLogin'])->name('postLogin');
Route::middleware(['auth', 'CekLevel:admin,user'])->group(function () {
    Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
    Route::get('/home', function () {
        return view('main');
    });
    Route::get('/catalogue', [App\Http\Controllers\CatalogueController::class, 'index'])->name('catalogue');
    Route::get('/print-catalogue', [App\Http\Controllers\CatalogueController::class, 'printCatalogue'])->name('printCatalogue');
    Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders');
    Route::get('/save-order/{id}', [App\Http\Controllers\OrderController::class, 'store'])->name('createOrder');
    Route::get('/delete-order/{id}', [App\Http\Controllers\OrderController::class, 'destroy'])->name('deleteOrder');
});
Route::middleware(['auth', 'CekLevel:admin'])->group(function () {
    Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
    Route::post('/find-product', [App\Http\Controllers\ProductController::class, 'search'])->name('findProduct');
    Route::get('/create-product', [App\Http\Controllers\ProductController::class, 'create'])->name('createProduct');
    Route::post('/save-product', [App\Http\Controllers\ProductController::class, 'store'])->name('storeProduct');
    Route::get('/update-product/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('updateProduct');
    Route::post('/save-update-product/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('saveUpdateProduct');
    Route::get('/delete-product/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('deleteProduct');
    Route::get('/mng-order', [App\Http\Controllers\OrderController::class, 'admin'])->name('orderList');
});