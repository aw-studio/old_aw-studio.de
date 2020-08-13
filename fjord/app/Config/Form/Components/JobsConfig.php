<?php

namespace FjordApp\Config\Form\Components;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Components\JobsController;

class JobsConfig extends FormConfig
{

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = JobsController::class;

    /**
     * Form name, is used for routing.
     *
     * @var string
     */
    public $formName = 'jobs';

    /**
     * Model singular and plural name.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Jobs & Praktika',
        ];
    }

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudShow $form
     * @return void
     */
    public function show(CrudShow $form)
    {

      $form->info('Einbindung')
      ->width(4)
      ->text('Diese Komponente wird automatisch auf der Startseite (Übersicht) sowie auf der Studio-Seite (Studio & Team) eingebunden und verlinkt zur Seite Bewerbung');

      $form->card(function ($form) {
        $form->input('h3_jobs')->title('Headline')->translatable();
        $form->wysiwyg('text_jobs')->title('Text')->translatable();
        $form->wysiwyg('list_jobs')->title('List')->translatable();
        $form->input('button_jobs')->title('Button')->translatable()->width(6);
      })
      ->width(8);
    }
}
