<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware'=>'auth' , 'prefix'=>'admin' , 'namespace'=>'Admin'] , static function($router){

    $router->get('users/add/{userId}/role' ,'UserController@addRole')->name('users.add.role');
    $router->post('users/add/{userId}/role' ,'UserController@storeRole')->name('users.store.role');

    $router->delete('users/destroy/{UserId}/role/{roleId}' ,'UserController@destroyRole')->name('users.destroy.role');

    $router->resource('users' , 'UserController',['except'=>'show']);

});

Route::group(['namespace'=>'Home'],static function($router){

    $router->get('authors','UserController@authors')->name('users.authors');
    $router->get('authors/{id}','UserController@author')->name('users.author');

    $router->get('profile','UserController@profile')->name('profile')->middleware('auth');
    $router->patch('profile','UserController@updateProfile')->name('profile.update')->middleware('auth');



});












//Route::group([] , function ($router){
//
//    $router->get('test' , function (){
//        auth()->user()->givePermissionTo(\Pzd\Role\Models\Permission::PERMISSION_SUPER_ADMIN);
//    });
//});
