<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\GudangController;



/*
|--------------------------------------------------------------------------
| Web Routeps
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

Route::get('/hello', function () {
    return "Hello World!";
});

Route::middleware(['auth'])->group(function() {
    Route::get('/product', [ProdukController::class, 'index']);
    Route::get('/product/add', [ProdukController::class, 'create']);
    Route::post('/product', [ProdukController::class, 'store']);
    Route::get('/product/edit/{id}', [ProdukController::class, 'edit']);
    Route::post('product/update/{id}', [ProdukController::class, 'update']);
    Route::get('/product/delete/{id}', [ProdukController::class, 'delete']);

    Route::get('/brand', [BrandController::class, 'index']);
    Route::get('/brand/add', [BrandController::class, 'create']);
    Route::post('/brand', [BrandController::class, 'store']);
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit']);
    Route::post('brand/update/{id}', [BrandController::class, 'update']);
    Route::get('/brand/delete/{id}', [BrandController::class, 'delete']);

    Route::get('/gudang', [GudangController::class, 'index']);
    Route::get('/gudang/add', [GudangController::class, 'create']);
    Route::post('/gudang', [GudangController::class, 'store']);
    Route::get('/gudang/edit/{id}', [GudangController::class, 'edit']);
    Route::post('gudang/update/{id}', [GudangController::class, 'update']);
    Route::get('/gudang/delete/{id}', [GudangController::class, 'delete']);
});

Route::get('/layout', function(){
    return view('layout.index');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
