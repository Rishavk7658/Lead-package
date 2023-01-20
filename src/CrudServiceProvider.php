<?php
namespace Netweb\Lead;
use Illuminate\Support\ServiceProvider;

class CrudServiceProvider extends ServiceProvider
{
    public  function boot()
    {
         $this->loadRoutesFrom(__DIR__.'/routes/web.php');
         $this->loadViewsFrom(__DIR__.'/views', 'crud');
         $this->loadMigrationsFrom(__DIR__.'/database/migrations');

         $this->mergeConfigFrom(__DIR__.'/config/crud.php', 'lead');
         
         $this->publishes([
            __DIR__.'/config/crud.php'=>config_path('crud.php'),
         ]);
    }

    public  function register(){
        
    }

}



?>