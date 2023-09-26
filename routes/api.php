<?php

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

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::group(['prefix' => 'books', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [RecipeController::class, 'index']);
    Route::post('add', [RecipeController::class, 'add']);
    Route::get('edit/{id}', [RecipeController::class, 'edit']);
    Route::post('update/{id}', [RecipeController::class, 'update']);
    Route::delete('delete/{id}', [RecipeController::class, 'delete']);
});
