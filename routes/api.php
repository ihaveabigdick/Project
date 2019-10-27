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
Route::post('/login','Api\UserController@login');
Route::get('/users','Api\UserController@getAll');
Route::get('/user/{id}','Api\UserController@get');
Route::post('/user','Api\UserController@create');
Route::put('/user/{id}','Api\UserController@update');
Route::delete('/user/{id}','Api\UserController@Delete');
Route::get('/userrr','Api\UserController@index');

Route::get('/file/{id}','Api\FileUploadController@fileDown');
Route::post('/file','Api\FileUploadController@fileUpload');
Route::post('/file64','Api\FileUploadController@fileUploadBase64');


Route::post('/menu','Api\MenuController@create');
Route::get('/menus','Api\MenuController@getAll');
Route::put('/menu/{id}','Api\MenuController@update');
Route::delete('/menu/{id}','Api\MenuController@Delete');

Route::post('/restaurant','Api\RestaurantController@create');
Route::get('/restaurants','Api\RestaurantController@getAll');
Route::put('/restaurant/{id}','Api\RestaurantController@update');
Route::delete('/restaurant/{id}','Api\RestaurantController@Delete');

Route::post('/restaurantworker','Api\RestaurantWorkerController@create');
Route::get('/restaurantworker','Api\RestaurantWorkerController@getAll');
Route::get('/restaurantworker/{id}','Api\RestaurantWorkerController@get');
Route::put('/restaurantworker/{id}','Api\RestaurantWorkerController@update');
Route::delete('/restaurantworker/{id}','Api\RestaurantWorkerController@Delete');

Route::post('/order','Api\OrderController@create');
Route::post('/orderInfo','Api\OrderController@createInfo');
Route::put('/order/{id}','Api\OrderController@update');
Route::put('/orderFinish/{id}','Api\OrderController@finish');

Route::post('/orderrr','Api\OrderrrController@create');




Route::post('/test','Api\testController@create');
Route::post('/testA','Api\testController@Array');



Route::post('/service/tofcm','Api\ServiceController@toFcm');
Route::post('/service/toall','Api\ServiceController@toGroup');



Route::post('/fcmup','Api\FcmController@fcmupdate');

Route::get('/cyut','Api\Cyut@index');




//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
