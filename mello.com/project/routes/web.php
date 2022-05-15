<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersSkillsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FindController;

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

Route::get('/show', [UsersSkillsController::class, 'showUsersSkills']);
Route::post('/show', [UsersSkillsController::class, 'showUsersSkills']);
Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/find/users', [FindController::class, 'findUsers']);
//Route::post('/login', function () {
//    return view('login');
//});
//Route::get('/login', function () {
//    return view('login');
//});

