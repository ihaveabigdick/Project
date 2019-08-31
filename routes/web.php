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

Route::get('/g8g8/{name?}', function ($name = '你就是老雞掰') {
    return '幹你娘老雞掰' . $name;
});
Route::group(['middleware' => ['web']], function () {

    Route::post('/submit', 'TaskController@show');
//    Route::view('/','greeting');

    Route::get('/', ['as' => 'task.index', 'uses' => 'TaskController@index']);
    Route::get('/photo', ['as' => 'task.photo', 'uses' => 'TaskController@photo']);


});


Route::view('/upload', "upload");