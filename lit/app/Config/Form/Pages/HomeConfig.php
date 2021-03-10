<?php

namespace Lit\Config\Form\Pages;

use App\Models\Reference;
use App\Models\TeamMember;
use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Pages\HomeController;

class HomeConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = HomeController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'pages/home';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Startseite',
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
        $page->info('Playground')
            ->width(3);
        $page->card(function ($form) {
            $form->textarea('h1')->title('Headline Playground')->translatable()->hint('jumbo Headline (h1)');
        })->width(9);

        $page->info('Intro')
            ->width(3);
        $page->card(function ($form) {
            $form->textarea('h2')->title('Headline')->translatable()->hint('große Headline (h2)');
            $form->input('button_services')->title('Button')->translatable()->hint('Button zum Leistungsspektrum');

            $form->group(function ($form) {
                $form->input('h3_design')->title('Headline Design')->translatable()->hint('(h3)');
                $form->wysiwyg('list_design')->title('List')->translatable();
                $form->wysiwyg('text_design')->title('Text')->translatable();
            })->width(6);

            $form->group(function ($form) {
                $form->input('h3_development')->title('Headline Development')->translatable()->hint('(h3)');
                $form->wysiwyg('list_development')->title('List')->translatable();
                $form->wysiwyg('text_development')->title('Text')->translatable();
            })->width(6);
        })->width(9);

        $page->info('Digitale Lösungen / Referenzen')
            ->width(3);
        $page->card(function ($form) {
            $form->input('h2_solutions')->title('Headline')->translatable()->hint('große Headline (h2)');
            $form->wysiwyg('list_solutions')->title('List')->translatable();

            $form->manyRelation('references')
                ->title('Referenzen/Highlights')
                ->model(Reference::class)
                ->preview(function ($table) {
                    $table->col('title');
                });
        })->width(9);

        $page->info('Kunden-Listen')
            ->text('Die Auflistung der Kunden wird aus den Kunden-Datensätzen automatisch – sortiert nach Gruppen und A-Z – eingebunden.')
            ->width(3);
        $page->card(function ($form) {
            $form->input('h2_customers')->title('Headline')->translatable()->hint('große Headline (h2)');
        })->width(9);

        $page->info('Blog')
            ->width(3);
        $page->card(function ($form) {
            $form->input('h2_blog')->title('Headline')->translatable()->hint('große Headline (h2)');
            $form->input('button_blog')->title('Button')->translatable()->hint('Button zum Blog')->width(8);
        })->width(9);

        $page->info('Studio')
            ->text('Der Hinweis zu Jobs und Praktika wird automatisch aus der Komponente „Jobs & Praktika“ eingebunden.')
            ->width(3);
        $page->card(function ($form) {
            $form->group(function ($form) {
                $form->input('h3_management')->title('Headline')->translatable()->hint('kleine Headline (h3)');
                $form->wysiwyg('text_management')->title('Text')->translatable();
                $form->manyRelation('team_members')
                    ->title('Geschäftsführung')
                    ->model(TeamMember::class)
                    ->preview(function ($table) {
                        $table->image('Image')
                            ->src('{image.conversion_urls.sm}')
                            ->maxWidth('50px')
                            ->small();
                        $table->col('name');
                    });
                $form->input('button_studio')->title('Button')->translatable()->hint('Button zu Studio & Team')->width(6);
            });
        })->width(9);
    }
}
