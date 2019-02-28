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

Route::get('/users', 'Admin\AdminUserController@getListUser');
Route::post('/search', 'Admin\AdminUserController@search');

Route::get('/user/{id}', 'v1\UserController@profile');
Route::put('/user/{id}', 'v1\UserController@update');

Route::post('/topic', 'v1\TopicController@create');
Route::post('/follow-topic/{user_id}', 'v1\TopicController@follow');

Route::post('/job', 'v1\JobController@create');
Route::post('/follow-job/{user_id}', 'v1\JobController@follow');