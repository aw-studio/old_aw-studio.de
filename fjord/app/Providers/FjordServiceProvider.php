<?php

namespace FjordApp\Providers;

use Fjord\Crud\CrudShow;
use Illuminate\Support\ServiceProvider;

class FjordServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        CrudShow::macro('meta', function () {
            $this->card(function ($form) {
                $form->input('metaTitle')
                    ->translatable(true)
                    ->title('Title')
                    ->width(12)
                    ->placeholder('Title');
                $form->input('metaDescription')
                    ->translatable(true)
                    ->title('Description')
                    ->width(12)
                    ->placeholder('Description');
                $form->input('metaKeywords')
                    ->translatable(true)
                    ->title('Keywords')
                    ->width(12)
                    ->placeholder('Keywords');
                $form->image('metaImage')
                    ->title('Image')
                    ->expand(true)
                    ->crop(2 / 1)
                    ->maxFiles(1)
                    ->width(12);
            })->title('Meta Tags');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
