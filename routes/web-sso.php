<?php

use App\User;
use Illuminate\Http\Request;

Route::post('/sso/register', 'AuthSsoController@register')->name('sso.register');
Route::post('/sso/sync', 'AuthSsoController@sync')->name('sso.sync');
