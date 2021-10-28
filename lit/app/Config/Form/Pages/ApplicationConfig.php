<?php

namespace Lit\Config\Form\Pages;

use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Pages\ApplicationController;
use Litstack\Meta\Traits\CrudHasMeta;

class ApplicationConfig extends FormConfig
{
    use CrudHasMeta;
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = ApplicationController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'pages/application';
    }

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
     * Setup form page.
     *
     * @param  \Lit\Crud\CrudShow  $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->info('Intro')
            ->width(3);
        $page->card(function ($form) {
            $form->textarea('h1')->title('Topline')->translatable()->hint('kleine Zeile über der großen Headline (h1)');
            $form->textarea('h2')->title('Headline')->translatable()->hint('große Headline (h2)');

            $form->wysiwyg('text')->title('Text')->translatable();
            $form->wysiwyg('list')->title('Liste')->translatable();
        })->width(9);

        $page->info('Positionen')
            ->width(3);
        $page->card(function ($form) {
            $form->block('positions')
                ->title('Positionen')
                ->blockWidth(1 / 2)
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
        })->width(9);

        $this->meta($page);
    }
}
