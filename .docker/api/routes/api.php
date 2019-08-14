<?php

Route::post('/register', "UserController@register");
Route::post('/login', "UserController@login");

Route::middleware('auth:api')->get('/user', "UserController@user");
Route::post('/profile', 'UserController@profile')->middleware('auth:api');
