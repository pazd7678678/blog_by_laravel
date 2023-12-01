<?php

namespace Pzd\Advertising\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Pzd\Advertising\Models\Advertising;
use Pzd\Advertising\Policies\AdvertisingPolicy;

class AdvertisingServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', "Advertising");
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this>$this->loadJsonTranslationsFrom(__DIR__ . '/../resources/lang');

        Route::middleware('web')
            ->namespace('Pzd\Advertising\Http\Controllers')
            ->group(__DIR__ . '/../routes/advertising_routs.php');

        Gate::policy(Advertising::class , AdvertisingPolicy::class);

//
    }



    public function boot()
    {
        $this->app->booted(static function () {
            config()->set('ConfigPanel.menus.advertisings', [
                'url'=>route('advertisings.index'),
                'title'=>'تبلیغات ',
                'icon'=>'mdi mdi-network'
            ]);
        });
    }

}
