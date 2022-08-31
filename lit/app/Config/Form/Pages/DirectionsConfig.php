<?php

namespace Lit\Config\Form\Pages;

use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Pages\DirectionsController;
use Litstack\Meta\Traits\FormHasMeta;

class DirectionsConfig extends FormConfig
{
    use FormHasMeta;
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = DirectionsController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return "pages/directions";
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Anfahrt',
        ];
    }

    /**
     * Setup form page.
     *
     * @param \Lit\Crud\CrudShow $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->info('Anfahrt')
            ->width(3);
        $page->card(function ($form) {
            $form->input('h1')->title('H1')->translatable();
            $form->wysiwyg('text')->title('Text')->translatable();
        })->width(9);

        $page->info('SEO Informations')
            ->width(3);
        $page->card(function ($form) {
            $form->seo();
        })->width(9);
    }
}
