<?php

namespace Lit\Providers;

use Illuminate\Support\ServiceProvider;
use Lit\Macros\Form\ContentAreaMacro;

class LitstackServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(lit_resource_path('views'), 'lit');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        (new ContentAreaMacro)->register();
    }
}
