<?php

use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\UserController;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('products', [ProductController::class, 'all']);
Route::get('categories', [ProductController::class, 'all']);

Route::POST('register', [UserController::class, 'register']);
Route::POST('login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function()
{
    Route::get('user', [UserController::class, 'fetch']);
    Route::post('user', [UserController::class, 'updateProfile']);
    Route::post('logout', [UserController::class, 'logout']);

    Route::get('transaction', [TransactionController::class, 'all']);
    Route::post('checkout', [TransactionController::class, 'checkout']);
});
