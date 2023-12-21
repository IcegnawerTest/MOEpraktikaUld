<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
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

Route::get('/', [ProductController::class,'index'])->name('index');
Auth::routes();
Route::get('/products', [ProductController::class,'products'])->name('products');

Route::get('/home', [ProductController::class, 'index'])->name('index');
Route::get('/{product}', [ProductController::class, 'detail'])->name('detail');

Route::post('/product/filter', [ProductController::class, 'filter'])->name('filter-product');
Route::get('/products/{id_product}',[ApplicationController::class,"confirm"]);

Route::group(['middleware' => 'role:client'], function () {
    Route::get('/cart/index', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/{item}', [CartController::class, 'remove'])->name('cart.remove');

    Route::post('/cart/updateQuantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');

    Route::post('/cart/removeAll', [CartController::class, 'removeAll'])->name('cart.removeAll');

    Route::post('/cart/application/add', [ApplicationController::class, 'add'])->name('application.add');
});

Route::group(['middleware' => 'role:admin'], function () {
    Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
    Route::post('/admin/products/filter', [AdminController::class, 'filter'])->name('admin.filter.product');
    Route::get('/admin/add', [AdminController::class, 'add'])->name('admin.add');
    Route::post('/admin/addPost', [AdminController::class, 'addPost'])->name('admin.addPost');
    Route::post('/admin/addTypePost', [AdminController::class, 'addTypePost'])->name('admin.addTypePost');
    Route::delete('/admin/deleteTypePost', [AdminController::class, 'deleteTypePost'])->name('admin.deleteTypePost');
    Route::post('/admin/updateTypePost', [AdminController::class, 'updateTypePost'])->name('admin.updateTypePost');
    Route::get('/admin/update/{product}', [AdminController::class, 'update'])->name('admin.update');
    Route::post('/admin/updatePost', [AdminController::class, 'updatePost'])->name('admin.updatePost');
    Route::delete('/admin/{product}', [AdminController::class, 'remove'])->name('admin.remove');

    Route::get('/admin/applications', [ApplicationController::class, 'applications'])->name('admin.applications');
    Route::post('/admin/appUpdate', [ApplicationController::class, 'appUpdate'])->name('admin.appUpdate');
});
