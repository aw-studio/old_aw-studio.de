<?php

namespace Lit\Config\Crud;

use App\Models\LandingPage;
use Ignite\Crud\Config\CrudConfig;
use Ignite\Crud\CrudIndex;
use Ignite\Crud\CrudShow;
use Illuminate\Support\Str;
use Lit\Http\Controllers\Crud\LandingPageController;

class LandingPageConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = LandingPage::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = LandingPageController::class;

    /**
     * Model singular and plural name.
     *
     * @param LandingPage|null landingPage
     * @return array
     */
    public function names(LandingPage $landingPage = null)
    {
        return [
            'singular' => 'LandingPage',
            'plural'   => 'LandingPages',
        ];
    }

    /**
     * Get crud route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'landing-pages';
    }

    /**
     * Build index page.
     *
     * @param  \Ignite\Crud\CrudIndex  $page
     * @return void
     */
    public function index(CrudIndex $page)
    {
        $page->table(function ($table) {
            $table->col('Title')->value('{title}')->sortBy('title');
        })->search('title');
    }

    /**
     * Setup show page.
     *
     * @param  \Ignite\Crud\CrudShow  $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->info('Title & Settings')
        ->width(3);
        $page->card(function ($form) {
            $form->input('title')
            ->hint('Der Slug wird aus diesem Titel gebildet')
            ->creationRules('required')
            ->width(10);
            $form->input('slug')
            ->width(6);
            $form->boolean('active')
            ->title('Aktiv/Inaktiv')
            ->width(2);
        })->width(9);

        $page->info('Content')
    ->width(3);
        $page->card(function ($form) {
            $form->wysiwyg('h1')
            ->width(10);
            $form->wysiwyg('text');
        })->width(9);

        // $page->info('SEO Informations')
        // ->width(3);
        // $page->card(function ($form) {
        //     $form->seo();
        // })->width(9);
    }
}
