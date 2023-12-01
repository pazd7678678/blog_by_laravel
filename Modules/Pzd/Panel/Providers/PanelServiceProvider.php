<?php

namespace Pzd\Panel\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Pzd\Panel\Models\Panel;
use Pzd\Panel\Policies\PanelPolicy;

class PanelServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views' , 'Panel');
        $this->mergeConfigFrom(__DIR__ . '/../Config/config.php' , 'ConfigPanel');



        Route::middleware('web')
            ->namespace('Pzd\Panel\Http\Controllers')
            ->group(__DIR__ . '/../routes/panel_routes.php');

        Gate::policy(Panel::class , PanelPolicy::class);

    }
    public function boot()
    {
        $this->app->booted(static function(){
            config()->set('ConfigPanel.menus.panel' , [
                'url' => route('panel.index') ,
                'title' => 'پنل مدیریتی' ,
                'icon' => 'mdi mdi-view-dashboard'
            ]);
        });

    }
}
