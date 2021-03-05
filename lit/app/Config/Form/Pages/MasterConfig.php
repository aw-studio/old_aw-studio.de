<?php

namespace Lit\Config\Form\Pages;

use App\Models\TeamMember;
use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Pages\MasterController;

class MasterConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = MasterController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'pages/master';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Master',
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
        $page->card(function ($form) {
            $form->textarea('h1')->title('Headline Playground')->translatable()->hint('jumbo Headline (h1)');
        })
            ->title('Playground')
            ->width(12);

        $page->card(function ($form) {
            $form->textarea('h2')->title('Headline')->translatable()->hint('große Headline (h2)')->width(9);
            $form->input('button_services')->title('Button')->translatable()->hint('Button zum Leistungsspektrum')->width(3);

            $form->group(function ($form) {
                $form->input('h3_design')->title('Headline Design')->translatable()->hint('(h3)');
                $form->wysiwyg('list_design')->title('List')->translatable();
                $form->wysiwyg('text_design')->title('Text')->translatable();
            })->width(5);

            $form->group(function ($form) {
                $form->input('h3_development')->title('Headline Development')->translatable()->hint('(h3)');
                $form->wysiwyg('list_development')->title('List')->translatable();
                $form->wysiwyg('text_development')->title('Text')->translatable();
            })->width(5);
        })
            ->title('Intro')
            ->width(12);

        $page->card(function ($form) {
            $form->group(function ($form) {
                $form->input('h2_solutions')->title('Headline')->translatable()->hint('große Headline (h2)');
                $form->wysiwyg('list_solutions')->title('List')->translatable();
            })->width(6);

            $form->info('Highlight-Referenzen')
                ->width(6)
                ->text('Die Highlight-Referenzen werden über die Collection „Highlights“ bei den Referenzen-Datensätzen gesteuert');
        })
            ->title('Digitale Lösungen / Referenzen')
            ->width(12);

        $page->card(function ($form) {
            $form->input('h2_customers')->title('Headline')->translatable()->hint('große Headline (h2)')->width(6);
            $form->info('Kunden-Listen')
                ->width(6)
                ->text('Die Auflistung der Kunden wird aus den Kunden-Datensätzen automatisch – sortiert nach Gruppen und A-Z – eingebunden.');
        })
            ->title('Kunden')
            ->width(12);

        $page->card(function ($form) {
            $form->group(function ($form) {
                $form->input('h3_management')->title('Headline')->translatable()->hint('kleine Headline (h3)')->width(6);
                $form->wysiwyg('text_management')->title('Text')->translatable()->width(10);
                $form->manyRelation('team_members')
                    ->title('Geschäftsführung')
                    ->model(TeamMember::class)
                    ->preview(function ($table) {
                        $table->image('Image')
                            ->src('{image.conversion_urls.sm}')
                            ->maxWidth('50px')
                            ->small();
                        $table->col('name');
                    })->width(12);
                $form->input('button_studio')->title('Button')->translatable()->hint('Button zu Studio & Team')->width(6);
            })->width(12);
        })
            ->title('Studio')
            ->width(7);
        $page->info('Jobs & Praktika')
            ->width(5)
            ->text('Der Hinweis zu Jobs und Praktika wird automatisch aus der Komponente „Jobs & Praktika“ eingebunden.');
    }
}
