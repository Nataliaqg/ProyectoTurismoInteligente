<?php

use App\Http\Controllers\Api\AuthController;
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

Route::post('/auth/register',[AuthController::class,'register']);
Route::post('/auth/login',[AuthController::class,'login']);

Route::group(['middleware' => ["auth:sanctum"]], function(){
    //rutas
    Route::get('user-profile',[AuthController::class, 'userProfile']);
    Route::get('logout',[AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
