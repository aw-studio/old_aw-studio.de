<?php

namespace FjordApp\Config\Form\Pages;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Pages\ServicesController;

class ServicesConfig extends FormConfig
{

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = ServicesController::class;

    /**
     * Form name, is used for routing.
     *
     * @var string
     */
    public $formName = 'services';

    /**
     * Model singular and plural name.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Leistungen',
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
            $form->textarea('h1')->title('Topline')->translatable()->hint('kleine Zeile über der großen Headline (h1)');
            $form->image('image')->title('Bild')->maxFiles(1)->expand()->width(8);
            $form->textarea('h2')->title('Headline')->translatable()->hint('große Headline (h2)');
            $form->wysiwyg('text_intro')->title('Text Intro')->translatable()->width(7);
            $form->wysiwyg('text_fjord')->title('Text Fjord')->translatable()->width(5);
        })
            ->title('Intro')
            ->width(12);


        $form->card(function ($form) {
            $form->block('services')
                ->title('Bereiche')
                ->blockWidth(1 / 2)
                ->repeatables(function ($repeatables) {
                    $repeatables->add('Bereich', function ($form, $preview) {
                        $preview->col('<b>{h3}</b>');
                        $preview->image()
                            ->src('{illustration.url}')
                            ->maxWidth('50px')
                            ->small();

                        $form->input('h3')
                            ->title('Headline')
                            ->translatable()
                            ->width(12);



                        $form->image('illustration')
                            ->title('Illustration')
                            ->maxFiles(1)
                            ->showFullImage()
                            ->width(12);

                        $form->wysiwyg('list_primary')
                            ->title('Primäre Liste')
                            ->translatable();

                        $form->wysiwyg('list_secondary')
                            ->title('Sekundäre Liste')
                            ->translatable();
                    });
                });
        })
            ->title('Leistungen')
            ->width(12);


        $form->card(function ($form) {
            $form->textarea('h2_philosophy_quote')->title('Zitat')->translatable()->hint('große Headline (h2)')->width(8);
            $form->wysiwyg('text_philosophy_credit')->title('Quelle')->translatable()->width(6);
            $form->wysiwyg('text_philosophy')->title('Text')->translatable()->width(6);
        })
            ->title('Philosophy')
            ->width(12);

        $form->card(function ($form) {
            $form->image('images')->title('Bilder')->maxFiles(3);
        })
            ->width(12);


        $form->card(function ($form) {
            $form->textarea('h2_workflow')->title('Headline')->translatable()->hint('große Headline (h2)');
            $form->wysiwyg('text_workflow')->title('Text')->translatable()->width(7);

            $form->block('methods')
                ->title('Methoden')
                ->blockWidth(1 / 2)
                ->repeatables(function ($repeatables) {
                    $repeatables->add('Methode', function ($form, $preview) {
                        $preview->col('<b>{h3}</b>');
                        $preview->image()
                            ->src('{illustration.url}')
                            ->maxWidth('50px')
                            ->small();


                        $form->input('h3')
                            ->title('Headline')
                            ->translatable()
                            ->width(12);

                        $form->image('illustration')
                            ->title('Illustration')
                            ->maxFiles(1)
                            ->showFullImage()
                            ->width(12);

                        $form->wysiwyg('text')
                            ->title('Text')
                            ->translatable()
                            ->width(12);
                    });
                });
        })
            ->title('Workflow')
            ->width(12);
    }
}
