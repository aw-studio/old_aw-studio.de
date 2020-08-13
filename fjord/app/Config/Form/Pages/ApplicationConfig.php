<?php

namespace FjordApp\Config\Form\Pages;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Pages\ApplicationController;

class ApplicationConfig extends FormConfig
{

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = ApplicationController::class;

    /**
     * Form name, is used for routing.
     *
     * @var string
     */
    public $formName = 'application';

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Bewerbung',
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
        $form->card(function ($form) {
            $form->textarea('h1')->title('Topline')->translatable()->hint('kleine Zeile über der großen Headline (h1)');
            $form->textarea('h2')->title('Headline')->translatable()->hint('große Headline (h2)');

            $form->group(function ($form) {
                $form->wysiwyg('text')->title('Text')->translatable();
                $form->wysiwyg('list')->title('Liste')->translatable();
            })->width(5);
        })
      ->title('Intro')
      ->width(12);

        $form->card(function ($form) {
            $form->block('positions')
  ->title('Positionen')
  ->blockWidth(1/2)
  ->repeatables(function ($repeatables) {
      $repeatables->add('Position', function ($form, $preview) {
          $preview->col('<b>{h3}</b>');

          $form->input('h3')
              ->title('Headline')
              ->translatable()
              ->width(12);

          $form->wysiwyg('text')
              ->title('Text')
              ->translatable();

          $form->wysiwyg('list')
              ->title('Liste')
              ->translatable();
      });
  });
        })
->width(12);
    }
}
