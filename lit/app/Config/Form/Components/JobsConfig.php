<?php

namespace Lit\Config\Form\Components;

use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Components\JobsController;

class JobsConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = JobsController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'components/jobs';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Jobs',
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
        $page->info('Einbindung')
            ->width(3)
            ->text('Diese Komponente wird automatisch auf der Startseite (Übersicht) sowie auf der Studio-Seite (Studio & Team) eingebunden und verlinkt zur Seite Bewerbung');
        $page->card(function ($form) {
            $form->input('h3_jobs')->title('Headline')->translatable();
            $form->wysiwyg('text_jobs')->title('Text')->translatable();
            $form->wysiwyg('list_jobs')->title('List')->translatable();
            $form->input('button_jobs')->title('Button')->translatable()->width(6);
        })->width(9);
    }
}
