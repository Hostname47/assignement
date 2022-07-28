<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{IndexController, ProductController, CategoryController};

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

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::post('/products', [ProductController::class, 'create'])->name('create-product');
Route::patch('/products', [ProductController::class, 'update'])->name('update-product');
Route::delete('/products', [ProductController::class, 'delete'])->name('delete-product');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/view', [CategoryController::class, 'view'])->name('view-category');

Route::get('/categories/add', [CategoryController::class, 'add'])->name('add-category');
Route::post('/categories', [CategoryController::class, 'create'])->name('create-category');
Route::get('/categories/edit', [CategoryController::class, 'edit'])->name('edit-category');
Route::patch('/categories', [CategoryController::class, 'update'])->name('update-category');
Route::get('/categories/delete', [CategoryController::class, 'delete'])->name('delete-category');
Route::delete('/categories', [CategoryController::class, 'destroy'])->name('destroy-category');
