<?php

namespace Lit\Config\Form\Pages;

use App\Models\TeamMember;
use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Pages\StudioController;
use Litstack\Meta\Traits\FormHasMeta;

class StudioConfig extends FormConfig
{
    use FormHasMeta;
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = StudioController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'pages/studio';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Studio',
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
        $page->info('Studio')
            ->width(3);
        $page->card(function ($form) {
            $form->input('h1')->title('Topline')->translatable()->hint('kleine Zeile über der großen Headline (h1)');
            $form->image('images')->title('Bilder')->maxFiles(3);
            $form->textarea('h2')->title('Headline')->translatable()->hint('große Headline (h2)');
            $form->wysiwyg('text_intro')->title('Text Intro')->translatable();
        })->width(9);

        $page->info('Team')
            ->width(3);
        $page->card(function ($form) {
            $form->textarea('h2_team_members')->title('Headline')->translatable()->hint('große Headline (h2)')->width(6);
            $form->wysiwyg('text_team_members')->title('Text')->translatable()->width(6);
            $form->manyRelation('team_members')
                ->title('Team-Mitglieder')
                ->model(TeamMember::class)
                ->sortable();
        })->width(9);

        $page->info('Jobs')
            ->text('Der Hinweis zu Jobs und Praktika wird automatisch aus der Komponente „Jobs & Praktika“ eingebunden.')
            ->width(3);
        $page->card(function ($form) {
            $form->image('images_jobs')->title('Bild')->maxFiles(1)->expand();
        })->width(9);

        $page->info('SEO Informations')
            ->width(3);
        $page->card(function ($form) {
            $form->seo();
        })->width(9);
    }
}
