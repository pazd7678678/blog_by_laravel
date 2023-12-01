<?php

use Illuminate\Support\Facades\Route;


Route::group([] , static function($router){

    // Register
    $router->get('/register', 'RegisterController@register')->name('register');
    $router->post('/register','RegisterController@store')->name('register.store');

    // Login
    $router->get('/login', 'LoginController@login')->name('login');
    $router->post('/login','LoginController@store')->name('login.store');

    // Email Verify
    $router->get('/verify/email' , 'VerifyController@verify')->name('verify.email')->middleware('auth');
    $router->get('/verify/email/{id}/{hash}' , 'VerifyController@verification')->name('verification.verify')->middleware(['auth','signed']);
    $router->post('/verify/email/resend' , 'VerifyController@resend')->name('verify.resend')->middleware(['auth','throttle:5,1']);

    // Password Reset
    $router->get('/password/reset','ResetController@reset')->name('password.resend')->middleware('guest');
    $router->post('/password/reset','ResetController@sendEmail')->name('password.resend.email')->middleware('guest');
    $router->get('/password/resend','ResetController@resetPassword')->name('password.reset')->middleware('guest');
    $router->post('/password/resend','ResetController@changePassword')->name('password.reset.change')->middleware('guest');

    //Logout

    $router->get('logout', 'LogoutController')->name('logout')->middleware('auth');


});
