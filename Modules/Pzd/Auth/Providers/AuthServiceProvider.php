<?php

namespace Pzd\Auth\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views' , 'Auth');


        Route::middleware('web')
            ->namespace('Pzd\Auth\Http\Controllers')
            ->group(__DIR__ . '/../routes/auth_routes.php');
    }

}
