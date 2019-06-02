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


//Route::post('/login','Api\UserController@login');
Route::get('/users','Api\UserController@getAll');
Route::get('/user/{id}','Api\UserController@get');
Route::post('/user','Api\UserController@create');
Route::put('/user/{id}','Api\UserController@update');
Route::delete('/user/{id}','Api\UserController@Delete');
Route::get('/userrr','Api\UserController@index');

Route::get('/file/{id}','Api\FileUploadController@file');

Route::post('/menu','Api\MenuController@create');
Route::get('/menus','Api\MenuController@getAll');
Route::put('/menu/{id}','Api\MenuController@update');
Route::delete('/menu/{id}','Api\MenuController@Delete');

Route::post('/restaurant','Api\RestaurantController@create');

Route::get('/fcmup','Api\FcmController@fcmupdate');

Route::get('/cyut','Api\Cyut@index');




//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
