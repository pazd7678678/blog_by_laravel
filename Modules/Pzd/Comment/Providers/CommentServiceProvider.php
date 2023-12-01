<?php

namespace Pzd\Comment\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CommentServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', "Comment");
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        Route::middleware('web')
            ->namespace('Pzd\Comment\Http\Controllers')
            ->group(__DIR__ . '/../routes/comment_routes.php');

//        Gate::policy(Comment::class ,CommentPolicy::class);


    }



    public function boot()
    {
        $this->app->booted(static function () {
            config()->set('ConfigPanel.menus.comments', [
                'url'=>route('comments.index'),
                'title'=>'نظرات ',
                'icon'=>'mdi mdi-comment-outline'
            ]);
        });
    }
}
