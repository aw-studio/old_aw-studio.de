<?php

namespace Lit\Config\Form\Pages;

use App\Models\Service;
use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Pages\ServicesController;
use Litstack\Meta\Traits\FormHasMeta;

class ServicesConfig extends FormConfig
{
    use FormHasMeta;
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
     * @param  \Lit\Crud\CrudShow  $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->info('Intro')
            ->width(3);
        $page->card(function ($form) {
            $form->input('h1')->title('Topline')->translatable();
            $form->textarea('h2')->title('Headline')->translatable()->hint('große Headline (h2)');
            $form->wysiwyg('text_intro')->title('Text Intro')->translatable()->width(12);
        })->width(9);

        $page->info('Leistungen')
            ->width(3);
        $page->card(function ($form) {
            $form->group(function ($form) {
                $form->manyRelation('services')
                ->model(Service::class)
                ->sortable()
                ->perPage(30)
                ->preview(function ($table) {
                    $table->col('Title')
                        ->value('{title}')
                        ->sortBy('title');
                });
            });
        })->width(9);

        $page->info('Fokus')
            ->width(3);
        $page->card(function ($form) {
            $form->input('title_philosophy')->title('Topline')->translatable();
            $form->textarea('h2_philosophy_quote')->title('Zitat')->translatable()->hint('große Headline (h2)');
            $form->wysiwyg('text_philosophy_credit')->title('Quelle')->translatable();
            $form->wysiwyg('text_philosophy')->title('Text')->translatable();
        })->width(9);

        $page->info('Galerie')
            ->width(3);
        $page->card(function ($form) {
            $form->image('images')->title('Bilder')->maxFiles(3);
        })->width(9);

        $page->info('Methoden')
            ->width(3);
        $page->card(function ($form) {
            $form->input('title_workflow')->title('Topline')->translatable();
            $form->textarea('h2_workflow')->title('Headline')->translatable()->hint('große Headline (h2)');
            $form->wysiwyg('text_workflow')->title('Text')->translatable();

            $form->block('methods')
                ->title('Methoden')
                ->repeatables(function ($repeatables) {
                    $repeatables->add('Methode', function ($form, $preview) {
                        $preview->col('<b>{h3}</b>');

                        $form->input('h3')
                            ->title('Headline')
                            ->translatable()
                            ->width(12);

                        $form->textarea('illustration_svg')
                            ->title('Illustration als SVGS')
                            ->placeholder('<svg ...')
                            ->hint('Füge hier den SVG Code ein.')
                            ->width(12);

                        $form->wysiwyg('text')
                            ->title('Text')
                            ->translatable()
                            ->width(12);
                    });
                });
        })->width(9);

        $page->info('SEO Informations')
            ->width(3);
        $page->card(function ($form) {
            $form->seo();
        })->width(9);
    }
}
