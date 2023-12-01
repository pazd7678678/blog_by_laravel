<?php

namespace Pzd\Role\Providers;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Pzd\Role\database\seeders\PermissionSeeder;
use Pzd\Role\Models\Permission;
use Pzd\Role\Models\Role;
use Pzd\Role\Policies\RolePolicy;

class RoleServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views' , 'Role');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../resources/lang');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        Route::middleware('web')
            ->namespace('Pzd\Role\Http\Controllers')
            ->group(__DIR__ . '/../routes/role_routes.php');
        DatabaseSeeder::$seeders [] = PermissionSeeder::class;

        Gate::before(static function($user){
            return $user->hasPermissionTo(Permission::PERMISSION_SUPER_ADMIN) ? true : null;
        });
        Gate::policy(Role::class , RolePolicy::class);


    }
    public function boot()
    {
        $this->app->booted(static function(){
            config()->set('ConfigPanel.menus.roles' , [
                'url' => route('roles.index') ,
                'title' => 'مقام ها' ,
                'icon' => 'mdi mdi-account-convert'
            ]);
        });

    }
}
