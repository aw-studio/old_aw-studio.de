<?php

namespace Lit\Config\Form\Pages;

use App\Models\Service;
use App\Models\TeamMember;
use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Pages\HomeController;
use Litstack\Meta\Traits\FormHasMeta;

class HomeConfig extends FormConfig
{
    use FormHasMeta;
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
     * @param  \Lit\Crud\CrudShow  $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->info('Playground')
            ->width(3);
        $page->card(function ($form) {
            $form->image('header_images')->title('Header Images')->maxFiles(10);
            $form->textarea('h1')->title('Headline Animation …')->translatable()->hint('jumbo (h1), shuffled solutions will be added typed');
            // $form->list('buzzwords')
            //     ->title('… Buzzwords')
            //     ->maxDepth(1)
            //     ->previewTitle('{buzzword}')
            //     ->form(function ($form) {
            //         $form->input('buzzword')
            //             ->title('Buzzword');
            //     });
        })->width(9);

        $page->info('Intro')
            ->width(3);
        $page->card(function ($form) {
            $form->textarea('h2')->title('Headline')->translatable()->hint('große Headline (h2)');
            $form->wysiwyg('text_intro')->hint('SEO Intro-Text');
        })->width(9);

        $page->info('Leistungen')
            ->width(3);
        $page->card(function ($form) {
            $form->input('h2_services')->title('Headline')->translatable()->hint('große Headline (h2)');
            $form->manyRelation('services')
            ->model(Service::class)
            ->sortable()
            ->perPage(20)
            ->preview(function ($table) {
                $table->col('Title')
                    ->value('{title}')
                    ->sortBy('title');
            });
            $form->input('button_services')->title('Button')->translatable()->hint('Button zum Leistungsspektrum')->width(1 / 2);
        })->width(9);

        $page->info('Digitale Lösungen / Referenzen')
            ->width(3);
        $page->card(function ($form) {
            $form->input('h2_solutions')->title('Headline')->translatable()->hint('große Headline (h2)');
            $form->wysiwyg('list_solutions')->title('List')->translatable();
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
                $form->image('image_studio')->title('Bild')->maxFiles(1)->expand();
                $form->input('button_studio')->title('Button')->translatable()->hint('Button zu Studio & Team')->width(6);
            });
        })->width(9);

        $page->info('SEO Informations')
            ->width(3);
        $page->card(function ($form) {
            $form->seo();
        })->width(9);
    }
}
