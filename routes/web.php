<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
    return view('welcome');
});

Route::group([
    'prefix' => 'product',
    'as' => 'product.'
], function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    
    Route::get('/create-product', [ProductController::class, 'create'])->name('create');
    Route::post('/store-product', [ProductController::class,'store'])->name('store');

    Route::get('/{id}', [ProductController::class, 'show'])->name('show');
});