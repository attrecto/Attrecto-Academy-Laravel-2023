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


Route::prefix('courses')->group(function () {
    Route::middleware(['api', 'role:admin'])->group(function () {
        Route::post('/',[CourseController::class,'store']);
        Route::get('/',  [CourseController::class, 'index']);
        Route::get('/{id}',  [CourseController::class, 'show']);
        Route::put('/{id}',[CourseController::class,'update']);
        Route::delete('/{id}',[CourseController::class,'destroy']);
    });
});

Route::group(['middleware' => ['api']], function() {
    Route::get('/users/me', [AuthController::class, 'me']);
    Route::post('/users',[UserController::class,'store']);
});

Route::post('/auth/login',[AuthController::class,'login']);
