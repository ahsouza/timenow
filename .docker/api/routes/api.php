<?php

use App\User;
use App\content;
use App\comment;

Route::post('/register', "UserController@register");
Route::post('/login', "UserController@login");

Route::post('/profile', 'UserController@profile')->middleware('auth:api');
Route::post('/content/add', 'ContentController@addContent')->middleware('auth:api');
Route::get('/content/list', 'ContentController@listContent')->middleware('auth:api');
Route::put('/content/liked/{id}', 'ContentController@likedContent')->middleware('auth:api');
Route::put('/content/comment/{id}', 'ContentController@commentContent')->middleware('auth:api');
