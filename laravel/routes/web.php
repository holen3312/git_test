<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\LaravelController;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TestHelloController;
use App\Http\Controllers\StudentController;
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
    return view('welcome');
});

Route::get('/hello', [TestController::class, "hello"]);

Route::get('/test', [TestController::class, "test"]);

Route::get('/laravel', [LaravelController::class, "laravelTest"]);

Route::get('/todos', [TodosController::class, "todos"]);

Route::get('/project', [BlogController::class, "blogPage" ]);

Route::get('/article/{id}', [BlogController::class, "articlePage"]);

Route::post('/article', [ArticleController::class, "add"]);

Route::post('article/delete', [ArticleController::class, "destroy"]);

Route::get('article/{id}/update', [BlogController::class, "updatePage"]);

Route::post('article/update', [ArticleController::class, "update"]);

Route::get('testHello', [TestHelloController::class, "test"]);


Route::get('/students', [StudentController::class, "student"]);

Route::get('/students/{id}',[ StudentController::class, "showOne"] );

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin' ,[TestHelloController::class, "admin"])->name('admin')->middleware(['admin', 'auth']);

Route::get('/newHome', [\App\Http\Controllers\HomeController::class, 'newHome'])->middleware(['auth', 'checkemail'])->name('newHome');

Route::get('email-confirm', [\App\Http\Controllers\HomeController::class, 'emailConfirm'])->middleware(['auth', 'gonewhome']);

Route::get('/api-articles', function () {
    return view('apiArticle');
});

Route::get('/products', function () {
    return view('products');
});
