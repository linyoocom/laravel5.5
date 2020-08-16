<?php

use Illuminate\Http\Request;

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

//  auth:api  给中间件auth传入api参数,即auth中间件使用api组的守卫(guard)   守卫配置在config/auth.php
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
