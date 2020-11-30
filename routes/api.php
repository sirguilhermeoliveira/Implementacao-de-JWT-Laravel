<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;

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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */


/*
Route::resources([
    'users' => UserController::class,
]); */



Route::post('auth/login', [AuthController::class, 'login']);


Route::group(['middleware' => ['apiJwt']], function(){
    Route::post('auth/logout', [AuthController::class, 'logout']);
    Route::get('users', [UserController::class, 'index']);
    // só colocar aqui dentro que a rota tá barrada por token
});
