<?php

namespace Lit\Config\Form\Pages;

use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Pages\ServicesController;

class ServicesConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = ServicesController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'pages/services';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
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
     * Setup form page.
     *
     * @param  \Lit\Crud\CrudShow $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->info('Intro')
            ->width(3);
        $page->card(function ($form) {
            $form->textarea('h1')->title('Topline')->translatable()->hint('kleine Zeile über der großen Headline (h1)');
            $form->image('image')->title('Bild')->maxFiles(1)->expand();
            $form->textarea('h2')->title('Headline')->translatable()->hint('große Headline (h2)');
            $form->wysiwyg('text_intro')->title('Text Intro')->translatable()->width(6);
            $form->wysiwyg('text_litstack')->title('Text Litstack')->translatable()->width(6);
        })->width(9);

        $page->info('Leistungen')
            ->width(3);
        $page->card(function ($form) {
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
        })->width(9);

        $page->info('Philosophy')
            ->width(3);
        $page->card(function ($form) {
            $form->textarea('h2_philosophy_quote')->title('Zitat')->translatable()->hint('große Headline (h2)');
            $form->wysiwyg('text_philosophy_credit')->title('Quelle')->translatable()->width(6);
            $form->wysiwyg('text_philosophy')->title('Text')->translatable()->width(6);
        })->width(9);

        $page->info('Galerie')
            ->width(3);
        $page->card(function ($form) {
            $form->image('images')->title('Bilder')->maxFiles(3);
        })->width(9);

        $page->info('Workflow')
            ->width(3);
        $page->card(function ($form) {
            $form->textarea('h2_workflow')->title('Headline')->translatable()->hint('große Headline (h2)');
            $form->wysiwyg('text_workflow')->title('Text')->translatable();

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
        })->width(9);

        $page->info('Meta')
            ->text('Die hier eingetragenen Metadaten werden auf der entsprechenden Seite im head Element geladen.')
            ->width(3);
        $page->meta()->width(9);
    }
}
