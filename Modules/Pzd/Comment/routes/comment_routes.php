<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth' , 'prefix'=> 'admin', 'namespace' => 'Admin'] , static function($router){
    $router->patch('comments/{id}/{status}/status', ['uses' => 'CommentController@changeStatus', 'as' =>'comments.change.status']);
    $router->delete('comments/{id}' , ['uses' => 'CommentController@destroy' , 'as' =>'comments.destroy']);

    $router->get('comments',['uses'=>'CommentController@index' , 'as'=> 'comments.index']);

});


Route::group(['middleware'=>'auth', 'namespace'=>'Home'] , static function($router){
   $router->post('comments/store', 'CommentController@store')->name('comments.store');
});
