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

Route::group([
    'namespace' => 'Wechat',
    'prefix'    => 'wechat',
], function() {
    Route::any('/', 'WechatController@serve');
    Route::get('/user', 'WechatController@user');
});

Route::group([
    'namespace' => 'System',
    'prefix'    => 'sys',
    'middleware' => 'basic_auth',
], function() {
    Route::get('/url', 'SystemController@wechat_maps');
    Route::get('/keys', 'SystemController@keys');
});
