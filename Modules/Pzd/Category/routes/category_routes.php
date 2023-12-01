<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware'=>'auth', 'prefix'=>'admin'] , static function($router){
    $router->resource('categories','CategoryController',['except'=>'show']);
    $router->patch('categories/{id}/status','CategoryController@setStatus')->name('change.status');
});

Route::group(['namespace'=>'Home'],static function($router){

    $router->get('categories/{slug}' ,'CategoryController@detail')->name('categories.detail');
});
