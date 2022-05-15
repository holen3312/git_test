<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FindController;

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

Route::get('/users', [UsersController::class, "showUsers"]);
Route::get('/user/{id}', [UsersController::class, 'showUser']);
Route::get('/skills', [SkillsController::class, "showSkills"]);
Route::get('/skill/{id}', [SkillsController::class, 'showSkill']);
//Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/login', [UsersController::class, 'login']);
Route::get('/find/users', [UsersController::class, 'findUsers']);
Route::get('/find/skills', [SkillsController::class, 'findSkills']);
Route::get('/sortingUsersA', [UsersController::class, 'sortingUsersA']);
Route::get('/sortingSkillsA', [SkillsController::class, 'sortingSkillsA']);
Route::get('/sortingUsersZ', [UsersController::class, 'sortingUsersZ']);
Route::get('/sortingSkillsZ', [SkillsController::class, 'sortingSkillsZ']);

Route::get('/check', function () {
        return [123456];
})->middleware('bearer-auth');
