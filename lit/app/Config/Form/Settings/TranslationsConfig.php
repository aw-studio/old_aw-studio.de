<?php

namespace Lit\Config\Form\Settings;

use Ignite\Crud\CrudShow;
use Ignite\Crud\Config\FormConfig;
use Litstack\Deeplable\TranslateAllAction;
use Lit\Http\Controllers\Form\Settings\TranslationsController;

class TranslationsConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = TranslationsController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return "settings/translations";
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Übersetzungen',
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
        $page->wrapper('lit-col', function ($page) {
            $page->action('Alle Daten Übersetzen', TranslateAllAction::class)->size('md');
        });
    }
}
