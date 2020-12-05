<?php

use Illuminate\Support\Facades\Route;;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrdersController;
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

// Route::get('/', function () {
//     return view('home');
// });

//home
Route::get('/',[StaticController::class, 'home']);

//products
Route::get('/products',[ProductsController::class, 'index']);
Route::get('/products/addProduct',[ProductsController::class, 'create']);
Route::post('/products',[ProductsController::class, 'store']);
Route::delete('/products/{product}',[ProductsController::class, 'destroy']);
Route::get('/products/{product}/edit',[ProductsController::class, 'edit']);
Route::patch('/products/{product}',[ProductsController::class, 'update']);

//orders
Route::get('/orders',[ProductsController::class, 'indexOrder']);
Route::get('/orders/{product}',[ProductsController::class, 'chooseProduct']);
Route::post('/orders/{product}',[OrdersController::class, 'store']);

//History
Route::get('/history',[OrdersController::class, 'indexHistory']);
// Route::get('/history', function () {
//     return view('history');
// });
