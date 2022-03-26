<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events){
        $events->listen(BuildingMenu::class, function (BuildingMenu $event ) {
            $items = app(Category::class)->get()->map(function(Category $category){
                return [
                    'key'    =>  'category-'.$category['id'],
                    'text'   =>  $category['name'],
                    'route'  =>  ['home',['category'=>$category['id']]],
                    'active' =>  ['home/'.$category['category'].'/*'],
                    'icon'   =>  'fas fa-book-open',
                ];
            });
            $event->menu->addIn('categories',
                ...$items
            );
        });
    }
}
