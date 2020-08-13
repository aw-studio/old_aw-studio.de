<?php

namespace FjordApp\Config\Form\Pages;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Pages\ReferencesController;

class ReferencesConfig extends FormConfig
{

  /**
   * Controller class.
   *
   * @var string
   */
  public $controller = ReferencesController::class;

  /**
   * Form name, is used for routing.
   *
   * @var string
   */
  public $formName = 'references';

  /**
   * Form singular name. This name will be displayed in the navigation.
   *
   * @return array
   */
  public function names()
  {
    return [
      'singular' => 'Referenzen',
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
    $form->meta();

    $form->card(function ($form) {
      $form->textarea('h1')->title('Topline')->translatable()->hint('kleine Zeile über der großen Headline (h1)')->width(6);
      $form->textarea('h2_highlights')->title('Headline Highlights')->translatable()->hint('große Headline (h2)')->width(8);
      $form->info('Referenzen Datensätze')
        ->width(12)
        ->text('Die Highlight-Referenzen werden automatisch mithilfe der Collection „Highlights“ dargetsellt.<br>(siehe Datensätze -> Referenzen)');
    })
      ->title('Highlights')
      ->width(12);

    $form->card(function ($form) {
      $form->input('h3_featured')->title('Headline weitere Referenzen')->translatable()->hint('kleine Headline (h3)')->width(6);
      $form->info('Referenzen Datensätze')
        ->width(12)
        ->text('Die weiteren Referenzen werden automatisch mithilfe der Collection „Featured“ dargestellt.<br>(siehe Datensätze -> Referenzen)');
    })
      ->title('Weitere Referenzen')
      ->width(12);

    $form->card(function ($form) {
      $form->input('h3_az')->title('Headline A-Z')->translatable()->hint('kleine Headline (h3)')->width(6);
      $form->info('Referenzen Datensätze')
        ->width(12)
        ->text('Die A-Z-Liste der Referenzen wird automatisch aus allen Referenz-Datensätzen dargestellt.<br>(siehe Datensätze -> Referenzen).');
    })
      ->title('A-Z')
      ->width(12);
  }
}
