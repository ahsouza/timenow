<?php

Route::post('/register', "UserController@register");
Route::post('/login', "UserController@login");

Route::middleware('auth:api')->get('/user', "UserController@user");
Route::middleware('auth:api')->post('/profile', "UserController@profile");