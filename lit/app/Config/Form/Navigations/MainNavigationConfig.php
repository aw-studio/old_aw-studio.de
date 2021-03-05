<?php

namespace Lit\Config\Form\Navigations;

use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Navigations\MainNavigationController;

class MainNavigationConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = MainNavigationController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'navigations/main-navigation';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Hauptnavigation',
        ];
    }

    /**
     * Setup form page.
     *
     * @param  \Lit\Crud\CrudShow $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->card(function ($form) {
            $form->nav('main')->title('Main Navigation')->maxDepth(3);
        });
    }
}
