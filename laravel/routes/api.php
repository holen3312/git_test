<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticlesController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\HaveFunController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products', [ProductController::class, 'product']);
Route::get('products/{id}', [ProductController::class, 'showOne']);
Route::get('/api-articles', [ArticlesController::class, 'show']);
Route::get('/api-articles/{id}', [ArticlesController::class, 'showArticle']);
Route::post('/api-articles', [ArticlesController::class, 'storeArticle']);
Route::put('/api-articles/{id}', [ArticlesController::class, 'putArticle']);
Route::patch('/api-articles/{id}', [ArticlesController::class, 'patchArticle']);
Route::delete('api-articles/{id}', [ArticlesController::class, 'deleteArticle']);

Route::apiResource('havefun', HaveFunController::class);
