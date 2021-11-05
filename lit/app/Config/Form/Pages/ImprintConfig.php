<?php

namespace Lit\Config\Form\Pages;

use Ignite\Crud\CrudShow;
use Ignite\Crud\Config\FormConfig;
use Litstack\Meta\Traits\FormHasMeta;
use Lit\Http\Controllers\Form\Pages\ImprintController;

class ImprintConfig extends FormConfig
{
    use FormHasMeta;
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = ImprintController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'pages/imprint';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Impressum',
        ];
    }

    /**
     * Setup form page.
     *
     * @param  \Lit\Crud\CrudShow  $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->card(function ($form) {
            $form->input('h1')->title('H1')->translatable();
            $form->wysiwyg('text')->title('Text')->translatable();
        });

        $page->info('SEO Informations')
            ->width(3);
        $page->card(function ($form) {
            $form->seo();
        })->width(9);
    }
}
