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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// 续租
//Route::post('/postxuzu','InterfaceController@PostXuzu');
// 退租
//Route::post('/posttuizu','InterfaceController@PostTuiZu');
// 提交保修数据
//Route::post('/postbaoxiu','InterfaceController@PostBaoxiu');
//登录接口
//Route::post('/postlogin','InterfaceController@PostUser');