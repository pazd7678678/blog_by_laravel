<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'admin' , 'middleware'=>'auth'] , static function($router){

    $router->resource('roles','RoleController',['except'=>'show']);
});
