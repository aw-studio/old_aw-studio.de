<?php

namespace FjordApp\Config\Form\Pages;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Pages\StudioController;
use App\Models\TeamMember;

class StudioConfig extends FormConfig
{

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = StudioController::class;

    /**
     * Form name, is used for routing.
     *
     * @var string
     */
    public $formName = 'studio';

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Studio & Team',
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
            $form->group(function ($form) {
                $form->input('h1')->title('Topline')->translatable()->hint('kleine Zeile über der großen Headline (h1)')->width(6);
            })->width(12);

            $form->group(function ($form) {
                $form->group(function ($form) {
                    $form->image('images')->title('Bilder')->maxFiles(3);
                })->width(8);
            })->width(6);

            $form->group(function ($form) {
                $form->textarea('h2')->title('Headline')->translatable()->hint('große Headline (h2)');
                $form->wysiwyg('text_intro')->title('Text Intro')->translatable()->width(12);
            })->width(6);
        })
            ->title('Studio')
            ->width(12);

        $form->card(function ($form) {
            $form->group(function ($form) {
                $form->textarea('h2_team_members')->title('Headline')->translatable()->hint('große Headline (h2)')->width(6);
            })->width(12);

            $form->group(function ($form) {
                $form->wysiwyg('text_team_members')->title('Text')->translatable()->width(6);
            })->width(12);

            $form->manyRelation('team_members')
                ->title('Team-Mitglieder')
                ->model(TeamMember::class);
        })
            ->title('Team')
            ->width(12);



        $form->card(function ($form) {
            $form->info('Jobs & Praktika')
                ->width(4)
                ->text('Der Hinweis zu Jobs und Praktika wird automatisch aus der Komponente „Jobs & Praktika“ eingebunden.');

            $form->image('images_jobs')->title('Bild')->maxFiles(1)->width(8)->expand();
        })
            ->title('Jobs')
            ->width(12);
    }
}
