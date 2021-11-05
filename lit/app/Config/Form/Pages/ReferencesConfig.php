<?php

namespace Lit\Config\Form\Pages;

use Ignite\Crud\CrudShow;
use Ignite\Crud\Config\FormConfig;
use Litstack\Meta\Traits\FormHasMeta;
use Lit\Http\Controllers\Form\Pages\ReferencesController;

class ReferencesConfig extends FormConfig
{
    use FormHasMeta;
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = ReferencesController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'pages/references';
    }

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
     * Setup form page.
     *
     * @param  \Lit\Crud\CrudShow  $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->info('Highlights')
            ->width(3);
        $page->card(function ($form) {
            $form->textarea('h1')->title('Topline')->translatable()->hint('kleine Zeile über der großen Headline (h1)')->width(6);
            $form->textarea('h2_highlights')->title('Headline Highlights')->translatable()->hint('große Headline (h2)')->width(8);
            $form->info('Referenzen Datensätze')
                ->text('Die Highlight-Referenzen werden automatisch mithilfe der Collection „Highlights“ dargetsellt.<br>(siehe Datensätze -> Referenzen)');
        })->width(9);

        $page->info('Weitere Referenzen')
            ->width(3);
        $page->card(function ($form) {
            $form->input('h3_featured')->title('Headline weitere Referenzen')->translatable()->hint('kleine Headline (h3)')->width(6);
            $form->info('Referenzen Datensätze')
                ->text('Die weiteren Referenzen werden automatisch mithilfe der Collection „Featured“ dargestellt.<br>(siehe Datensätze -> Referenzen)');
        })->width(9);

        $page->info('A-Z')
            ->width(3);
        $page->card(function ($form) {
            $form->input('h3_az')->title('Headline A-Z')->translatable()->hint('kleine Headline (h3)')->width(6);
            $form->info('Referenzen Datensätze')
                ->text('Die A-Z-Liste der Referenzen wird automatisch aus allen Referenz-Datensätzen dargestellt.<br>(siehe Datensätze -> Referenzen).');
        })->width(9);

        $page->info('SEO Informations')
            ->width(3);
        $page->card(function ($form) {
            $form->seo();
        })->width(9);
    }
}
