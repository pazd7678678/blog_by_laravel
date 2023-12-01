<?php

namespace Pzd\Article\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Pzd\Article\Models\Article;
use Pzd\Article\Policies\ArticlePolicy;

class ArticleServiceProvider extends  ServiceProvider
{
    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', "Article");
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../resources/lang');

        Route::middleware('web')
            ->namespace('Pzd\Article\Http\Controllers')
            ->group(__DIR__ . '/../routes/article_routes.php');
        Gate::policy(Article::class , ArticlePolicy::class);

    }



    public function boot()
    {

        $this->app->booted(static function () {
            config()->set('ConfigPanel.menus.articles', [
                'url'=>route('articles.index'),
                'title'=>'مقالات ',
                'icon'=>'mdi mdi-postage-stamp'
            ]);
        });
    }

}
