<?php

Route::resource('/user', 'UserController');
Route::resource('/game', 'GameController');
Route::controller('/game-action', 'GameActionController');
Route::controller('/', 'HomeController');
