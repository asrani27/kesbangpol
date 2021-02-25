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

Route::get('/user', 'ApiController@user');
Route::get('/user/data/{id}', 'ApiController@dataUser');
Route::post('/user/add', 'ApiController@insertUser');
Route::post('/user/update/{id}', 'ApiController@updateUser');
Route::delete('/user/delete/{id}', 'ApiController@deleteUser');
