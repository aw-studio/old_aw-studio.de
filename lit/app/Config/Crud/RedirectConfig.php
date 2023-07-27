<?php

namespace Lit\Config\Crud;

use AwStudio\Redirects\Models\Redirect;
use Ignite\Crud\Config\CrudConfig;
use Ignite\Crud\CrudColumnBuilder;
use Ignite\Crud\CrudIndex;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Crud\RedirectController;

class RedirectConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Redirect::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = RedirectController::class;

    /**
     * Model singular and plural name.
     *
     * @param Redirect|null redirect
     * @return array
     */
    public function names(Redirect $redirect = null)
    {
        return [
            'singular' => 'URL Umleitung',
            'plural'   => 'URL Umleitungen',
        ];
    }

    /**
     * Get crud route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'redirects';
    }

    /**
     * Build index page.
     *
     * @param  \Ignite\Crud\CrudIndex $page
     * @return void
     */
    public function index(CrudIndex $page)
    {
        $page->table(function (CrudColumnBuilder $table) {
            $table
                ->col('Von')
                ->value('{from_url}')
                ->sortBy('from_url');

            $table
                ->col('Nach')
                ->value('{to_url}')
                ->sortBy('to_url');

            $table
                ->col('Status Code')
                ->value('{http_status_code}')
                ->sortBy('http_status_code');

            $table->field('Active', fn ($column) => $column->sortBy('active')->label('Aktiv')->small())
                ->boolean('active');
        })->search(['from_url', 'to_url']);
    }

    /**
     * Setup show page.
     *
     * @param  \Ignite\Crud\CrudShow $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->card(function ($form) {
            $form->input('from_url')
                ->title('From')
                ->hint('Pfad oder URL, der/die umgeleitet werden soll')
                ->creationRules('required')
                ->rules('min:1')
                ->width(8);

            $form->input('to_url')
                ->title('To')
                ->hint('Der Pfad oder die URL, auf den/die umgeleitet werden soll')
                ->creationRules('required')
                ->rules('min:1')
                ->width(12);

            $form->select('http_status_code')
                ->title('Status Code')
                ->creationRules('required')
                ->options([
                    301 => '301 (Permanent)',
                    302 => '302 (Temporär)',
                    // 303 => '303 (See Other)',
                    // 304 => '304 (Not Modified)',
                    // 307 => '307 (Temporary Redirect)',
                    // 308 => '308 (Permanent Redirect)',
                ])
                ->hint('Wähle den HTTP-Statuscode. Standard: 301')
                ->width(6);
        })->width(9);

        $page->card(function ($form) {
            $form->boolean('active')
                ->title('Active')
                ->hint('Aktiviere / Deaktiviere die Weiterleitung');
        })->secondary()->width(3);
    }
}
