<?php

Route::post('/register', "UserController@register");
Route::post('/login', "UserController@login");

Route::post('/profile', 'UserController@profile')->middleware('auth:api');
