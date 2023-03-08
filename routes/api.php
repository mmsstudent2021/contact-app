<?php

use App\Http\Controllers\Api\BillingApiController;
use App\Http\Controllers\api\TransferApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ContactController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix("v1")->group(function(){
    Route::controller(ApiAuthController::class)->group(function(){
        Route::post('/register', 'register');
        Route::post('/login', 'login');
        Route::middleware(["auth:sanctum"])->group(function(){
            Route::get('/user-profile', 'profile');
            Route::get('/user-devices', 'devices');
            Route::post('/change-password', 'changePassword');
            Route::post('/user-logout', 'logout');
        });
    });
    Route::middleware(["auth:sanctum"])->group(function(){
       Route::apiResource("/contact",ContactController::class);

       Route::group(['prefix'=>'billing'],function (){
        Route::get('/',[BillingApiController::class,'index']);
        Route::post('/generate',[BillingApiController::class,'generate']);
        Route::post('/top-up',[BillingApiController::class,'topUp']);

       });

       Route::group(['prefix'=>'transaction'],function (){
        Route::post('/transfer',[TransferApiController::class,'transfer']);
        Route::get('/history',[TransferApiController::class,'history']);
       });
    });
});
