<?php

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


// 后台人口--登录页
Route::get('/admin','AdminController@admin_login')->name('admin_login');
Route::post('/admin_doLogin','AdminController@admin_doLogin')->name('admin_doLogin');

// 后台退出
Route::get('/admin_logout','AdminController@admin_logout')->name('admin_logout');

// 后台主页开始
Route::get('/admin/index','AdminController@index')->name('admin_index');
Route::get('/admin/indexTop','AdminController@indexTop');
Route::get('/admin/indexLeft','AdminController@indexLeft');
Route::get('/admin/indexSwich','AdminController@indexSwich');
Route::get('/admin/indexMain','AdminController@indexMain')->name('indexMain');
Route::get('/admin/indexBottom','AdminController@indexBottom');
// 后台主页结束

// 删除住户
Route::get('/admin/deleteHousehold/{id}','AdminController@delHousehold')->name('deleteHousehold');

// 编辑用户
Route::get('/admin/editHousehold/{id}','AdminController@editHousehold')->name('editHousehold');

// 执行编辑
Route::post('/admin/doeditHold/{id}','AdminController@doeditHold')->name('doeditHold');
