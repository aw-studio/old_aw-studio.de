<?php

namespace Lit\Providers;

use Ignite\Crud\Fields\Route;
use Illuminate\Support\ServiceProvider;
use Litstack\Pages\Models\Page;

class RouteRegistrationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(lit_resource_path('views'), 'lit');

        Route::register('app', function ($collection) {
            $collection->route('Startseite', 'home', fn ($locale) => __route('home'));
            $collection->route('Referenzen', 'references', fn ($locale) => __route('references'));
            $collection->route('Leistungen', 'services', fn ($locale) => __route('services'));
            $collection->route('Studio', 'studio', fn ($locale) => __route('studio'));
            // Page::collection('about')->get()->addToRouteCollection('Über uns Unterseiten', $collection);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
