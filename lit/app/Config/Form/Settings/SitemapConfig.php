<?php

namespace Lit\Config\Form\Settings;

use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Actions\GenerateXmlSitemapAction;
use Lit\Http\Controllers\Form\Settings\SitemapController;

class SitemapConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = SitemapController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'settings/sitemap';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Sitemap',
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
            // $form->action('Cache leeren', ClearCacheAction::class);
            $form->action('Sitemap generieren', GenerateXmlSitemapAction::class);
        });
    }
}
