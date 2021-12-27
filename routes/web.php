<?php

use App\Http\Controllers\Products;
use App\Http\Controllers\Tags;
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
    return view('home');
});

Auth::routes();

//products
Route::get('/products', [Products::class, 'index'])->name('products');
Route::get('/products/new', [Products::class, 'create'])->name('products.create');
Route::post('/products', [Products::class, 'save'])->name('products.save');
Route::get('/products/edit/{id}', [Products::class, 'edit'])->name('products.edit');
Route::post('/products/update', [Products::class, 'update'])->name('products.update');
Route::get('/products/delete/{id}', [Products::class, 'delete'])->name('products.delete');

//tags
Route::get('/tags', [Tags::class, 'index'])->name('tags');
Route::get('/tags/new', [Tags::class, 'create'])->name('tags.create');
Route::post('/tags', [Tags::class, 'save'])->name('tags.save');
Route::get('/tags/edit/{id}', [Tags::class, 'edit'])->name('tags.edit');
Route::post('/tags/update', [Tags::class, 'update'])->name('tags.update');
Route::get('/tags/delete/{id}', [Tags::class, 'delete'])->name('tags.delete');

//relatório
Route::get('/report', [Tags::class, 'report'])->name('reports');

