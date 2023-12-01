<?php

namespace Pzd\User\Providers;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Pzd\User\Models\User;
use Pzd\User\Policies\UserPolicy;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', "User");
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        Route::middleware('web')
            ->namespace('Pzd\User\Http\Controllers')
            ->group(__DIR__ . '/../routes/user_routes.php');

        Gate::policy(User::class ,UserPolicy::class);


        Factory::guessFactoryNamesUsing(static function(string $modelName){
           return 'Pzd\User\database\factories\\' . class_basename($modelName) . 'Factory';
        });
    }



    public function boot()
    {
        $this->app->booted(static function () {
            config()->set('ConfigPanel.menus.users', [
                'url'=>route('users.index'),
                'title'=>'کاربران ',
                'icon'=>'mdi mdi-account-group'
            ]);
        });
    }
}
