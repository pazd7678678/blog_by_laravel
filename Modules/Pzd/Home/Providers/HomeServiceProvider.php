<?php

namespace Pzd\Home\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Pzd\Home\Repositories\HomeRepo;

class HomeServiceProvider extends ServiceProvider
{
   public function register()
   {
     $this->loadViewsFrom(__DIR__ . '/../resources/views','Home');
      Route::middleware('web')
          ->namespace('Pzd\Home\Http\Controllers')
          ->group(__DIR__ . '/../Routes/home_routes.php');
   }
   public function boot()
   {
       view()->composer(['Home::section.header','Home::section.footer','Category::Home.detail'],static function($view){
           $homeRepo = new HomeRepo;
           $categories = $homeRepo->getActiveCategories()->get();
           $view->with(['categories'=> $categories]);

       });
       $this->app->booted( static function(){
           config()->set('ConfigPanel.menus.home' , [
               'url' => route('home.index') ,
               'title' => 'صفحه اصلی ' ,
               'icon' => 'fas fa-home'
           ]);
       });
   }
}
