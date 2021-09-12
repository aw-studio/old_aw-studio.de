<?php

namespace Lit\Config\Crud;

use App\Models\TeamMember;
use Ignite\Crud\Config\CrudConfig;
use Ignite\Crud\CrudIndex;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Crud\TeamMemberController;

class TeamMemberConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = TeamMember::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = TeamMemberController::class;

    /**
     * Model singular and plural name.
     *
     * @param TeamMember|null teamMember
     * @return array
     */
    public function names(TeamMember $teamMember = null)
    {
        return [
            'singular' => 'Teammitglied',
            // 'singular' => $teamMember->name ?: 'Teammitglied',
            'plural' => 'Team',
        ];
    }

    /**
     * Get crud route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'team-members';
    }

    /**
     * Build index page.
     *
     * @param  \Ignite\Crud\CrudIndex  $page
     * @return void
     */
    public function index(CrudIndex $page)
    {
        $page->table(function ($table) {
            $table->image('Image')
                ->src('{image.conversion_urls.sm}')
                ->maxWidth('50px')
                ->small();

            $table->col('Name')
                ->value('<b>{name}</b>')
                ->sortBy('name');

            $table->col('Position')
                ->value('{position}')
                ->sortBy('position');
        })->search('title');
    }

    /**
     * Setup show page.
     *
     * @param  \Ignite\Crud\CrudShow  $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->card(function ($form) {
            $form->image('image')
                ->title('Foto')
                ->expand()
                ->width(4)
                ->maxFiles(1)
                ->firstBig();

            $form->group(function ($form) {
                $form->input('name')
                    ->title('Name')
                    ->width(12);
                $form->input('position')
                    ->title('Position')
                    ->width(12);
                $form->input('profession')
                    ->title('Profession')
                    ->width(12);
            })->width(8);
        });
    }
}
