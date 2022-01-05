<?php

use App\Http\Controllers\CartController;
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

Route::get('/login', ([\App\Http\Controllers\LoginController::class, 'index']))->name('login')->middleware('guest');
Route::post('/login', ([\App\Http\Controllers\LoginController::class, 'login']));
ROute::post('/logout', ([\App\Http\Controllers\LoginController::class, 'logout']));

Route::get('/register', ([\App\Http\Controllers\RegisterController::class, 'index']))->middleware('guest');
Route::post('/register', ([\App\Http\Controllers\RegisterController::class, 'store']));

Route::get('/updateprofile', ([\App\Http\Controllers\RegisterController::class, 'view']));
Route::post('/updateprofile', ([\App\Http\Controllers\RegisterController::class, 'update']));

Route::get('/search', ([\App\Http\Controllers\ProductController::class, 'search']));

Route::get('/insertproduct',([\App\Http\Controllers\ProductController::class, 'index']));
Route::post('/insertproduct',([\App\Http\Controllers\ProductController::class, 'insertProduct']));

Route::get('/updateproduct/{id}',([\App\Http\Controllers\ProductController::class, 'viewUpdate']));
Route::post('/updateproduct/{id}',([\App\Http\Controllers\ProductController::class, 'updateProduct']));

Route::get('/', ([\App\Http\Controllers\ProductController::class, 'viewProduct']));

Route::get('/details/{id}', ([\App\Http\Controllers\ProductController::class, 'details']));
Route::post('/details/{id}',([\App\Http\Controllers\CartController::class, 'add']));

Route::get('/manageuser', ([\App\Http\Controllers\RegisterController::class,'userData']));
Route::post('/manageuser/{id}', ([\App\Http\Controllers\RegisterController::class,'delete']));

Route::get('/cart',([CartController::class, 'index']));
Route::get('/deletecart/{id}',([CartController::class, 'deletecart']));

Route::get('/checkout',([CartController::class,'checkout']));
Route::get('/transaction',([CartController::class,'transaction']));

Route::get('transactiondetail/{id}',([CartController::class, 'detailtransaction']));
