<?php

namespace Kovyakin\Table\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

use Kovyakin\Table\View\Components\TableComponent;

class TableServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/table_vue.php' => config_path('table_vue.php'),
            __DIR__ . '/../resources/views' => resource_path('views/vendor/table'),
            __DIR__ . '/../resources/js' => public_path('/js/'),
//            __DIR__ . '/../public' => public_path('/'),
        ], 'table_vue');
        Blade::component('package-table', TableComponent::class);
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'table');
    }
}
