<?php

namespace Pzd\Category\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Pzd\Category\Models\Category;
use Pzd\Category\Policies\CategoryPolicy;

class CategoryServiceProvider extends ServiceProvider
{
    public function register()
    {
       $this->loadViewsFrom(__DIR__ . '/../resources/views' , 'Category');
       $this->loadMigrationsFrom(__DIR__ . '/../database/Migrations');
       $this->loadJsonTranslationsFrom(__DIR__ . '/../resources/lang');

       Route::middleware('web')
           ->namespace('Pzd\Category\Http\Controllers')
           ->group(__DIR__ . '/../routes/category_routes.php');

       Gate::policy(Category::class , CategoryPolicy::class);
    }

    public function boot()
    {
        $this->app->booted(static function () {
            config()->set('ConfigPanel.menus.categories', [
                'url'=>route('categories.index'),
                'title'=>'دسته بندی ها ',
                'icon'=>'mdi mdi-folder-open-outline'
            ]);
        });
    }

}
