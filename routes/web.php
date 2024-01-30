<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::middleware('auth:sanctum')->get('/home', [App\Http\Controllers\ProductController::class, 'index'])->name('home');

Route::get('/products/{id}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
Route::get('/products/list', [App\Http\Controllers\ProductController::class, 'list'])->name('product.list');



