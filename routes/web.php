<?php

use Illuminate\Support\Facades\Auth;
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
    return view('user.product');
});

Route::get('/Logout', [App\Http\Controllers\UsersController::class, 'logout'])->name('logout_user');

Route::get('/Users', [App\Http\Controllers\UsersController::class, 'list_users'])->name('list_users');
Route::post('/Users/Store', [App\Http\Controllers\UsersController::class, 'store_users'])->name('store_users');
Route::get('/Users/{id}/Destroy', [App\Http\Controllers\UsersController::class, 'destroy_users'])->name('destroy_users');
Route::post('/Users/{id}/Update', [App\Http\Controllers\UsersController::class, 'update_users'])->name('update_users');
Route::post('/Users/{id}/Change-Password', [App\Http\Controllers\UsersController::class, 'update_password_users'])->name('update_password_users');

Route::get('/Master/Kategori', [App\Http\Controllers\MasterController::class, 'list_kategori'])->name('list_kategori');
Route::post('/Master/Kategori/Store', [App\Http\Controllers\MasterController::class, 'store_kategori'])->name('store_kategori');
Route::post('/Master/Kategori/{id}/Update', [App\Http\Controllers\MasterController::class, 'update_kategori'])->name('update_kategori');
Route::get('/Master/Supplier', [App\Http\Controllers\MasterController::class, 'list_supplier'])->name('list_supplier');
Route::post('/Master/Supplier/Store', [App\Http\Controllers\MasterController::class, 'store_supplier'])->name('store_supplier');
Route::post('/Master/Supplier/{id}/Update', [App\Http\Controllers\MasterController::class, 'update_supplier'])->name('update_supplier');
Route::get('/Master/Pelanggan', [App\Http\Controllers\MasterController::class, 'list_pelanggan'])->name('list_pelanggan');
Route::post('/Master/Pelanggan/Store', [App\Http\Controllers\MasterController::class, 'store_pelanggan'])->name('store_pelanggan');
Route::post('/Master/Pelanggan/{id}/Update', [App\Http\Controllers\MasterController::class, 'update_pelanggan'])->name('update_pelanggan');
Route::get('/Master/{id}/Destroy/{type}', [App\Http\Controllers\MasterController::class, 'destroy_master'])->name('destroy_master');

Route::get('/Produk', [App\Http\Controllers\ProductController::class, 'list_product'])->name('list_product');
Route::get('/Produk/{id}/Destroy', [App\Http\Controllers\ProductController::class, 'destroy_product'])->name('destroy_product');
Route::post('/Produk/Store', [App\Http\Controllers\ProductController::class, 'store_product'])->name('store_product');
Route::post('/Produk/{id}/Update', [App\Http\Controllers\ProductController::class, 'update_product'])->name('update_product');

// Auth::routes();
Route::get('/Login-Admin', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/Login-Admin', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::get('/Dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/getKategori', [App\Http\Controllers\HomeController::class, 'getKategori'])->name('getKategori');
Route::get('/getSupplier', [App\Http\Controllers\HomeController::class, 'getSupplier'])->name('getSupplier');
