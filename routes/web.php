<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ProductController, CategoryController};

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
});

Route::post('/products', [ProductController::class, 'create'])->name('create-product');
Route::patch('/products', [ProductController::class, 'update'])->name('update-product');
Route::delete('/products', [ProductController::class, 'delete'])->name('delete-product');

Route::post('/categories', [CategoryController::class, 'create'])->name('create-category');
Route::patch('/categories', [CategoryController::class, 'update'])->name('update-category');
Route::delete('/categories', [CategoryController::class, 'delete'])->name('delete-category');
