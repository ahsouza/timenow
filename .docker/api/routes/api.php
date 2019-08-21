<?php

Route::post('/register', "UserController@register");
Route::post('/login', "UserController@login");

Route::post('/profile', 'UserController@profile')->middleware('auth:api');
Route::post('/content/add', 'ContentController@addContent')->middleware('auth:api');
Route::get('/content/list', 'ContentController@listContent')->middleware('auth:api');
