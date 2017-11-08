<?php

namespace PermissionsHandler;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use PermissionsHandler\PermissionsHandler;
use Doctrine\Common\Annotations\AnnotationRegistry; 

class PermissionsHandlerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        require_once(__DIR__.'/Blade/Directives.php');

        // register console commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                \PermissionsHandler\Commands\AddPermission::class,
                \PermissionsHandler\Commands\AssignRole::class,
            ]);
        }
        
        $this->publishes([
            __DIR__.'/Migrations' => base_path('database/migrations/'),
            __DIR__.'/Config' => base_path('config'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('permissionsHandler', function () {
            $permissionsHandler = new PermissionsHandler(auth()->user());
            return $permissionsHandler;
        });
        // register annotation
        AnnotationRegistry::registerFile(__DIR__.'/Permissions.php');
    }
}
