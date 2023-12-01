<?php


use Illuminate\Support\Facades\Route;


Route::group(['middleware'=>'auth' , 'prefix'=>'admin'] , static function($router){

    $router->resource('advertisings','AdvertisingController');

});
