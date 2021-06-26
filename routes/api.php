<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//public routes
Route::resource('products', ProductController::class)->only('index', 'show', 'search');
Route::get('products/search/{name}', [ProductController::class, 'search']);
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

//protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
  Route::resource('products', ProductController::class)->only('store', 'update', 'destroy');
  Route::post('logout', [AuthController::class, 'logout']);
});
