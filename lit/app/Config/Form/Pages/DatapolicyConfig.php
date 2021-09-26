<?php

namespace Lit\Config\Form\Pages;

use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Pages\DatapolicyController;
use Litstack\Meta\Traits\CrudHasMeta;

class DatapolicyConfig extends FormConfig
{
    use CrudHasMeta;
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = DatapolicyController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'pages/datapolicy';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Datenschutz',
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
        $this->meta($page);
    }
}
