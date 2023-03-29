<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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

Route::post('/users',[UserController::class,'store']);

Route::post('/courses',[CourseController::class,'store']);
Route::get('/courses',  [CourseController::class, 'index']);
Route::get('/courses/{id}',  [CourseController::class, 'show']);

Route::put('/courses/{id}',[CourseController::class,'update']);
Route::delete('/courses/{id}',[CourseController::class,'destroy']);


Route::post('/auth/login',[AuthController::class,'login']);

Route::group(['middleware' => ['api']], function() {
    Route::get('/users/me', [AuthController::class, 'me']);
});
