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

Route::post('/login-facebook', 'v1\AuthController@facebook');

Route::group([
    'prefix' => 'admin'
], function () {
    Route::group(['namespace' => 'Admin'], function () {
        Route::get('/users', 'AdminUserController@getListUser');
        Route::post('/search', 'AdminUserController@search');
    });
});

Route::group([
    'prefix' => 'v1'
], function () {
    Route::group(['namespace' => 'v1'], function () {
        Route::get('/user/{id}', 'UserController@profile');
        Route::put('/user/{id}', 'UserController@update');

        Route::post('/topic', 'TopicController@create');
        Route::post('/follow-topic/{user_id}', 'TopicController@follow');

        Route::post('/job', 'JobController@create');
        Route::post('/follow-job/{user_id}', 'JobController@follow');
    });
});