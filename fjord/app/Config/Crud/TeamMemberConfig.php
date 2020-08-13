<?php

namespace FjordApp\Config\Crud;

use Fjord\Crud\CrudShow;
use Fjord\Crud\CrudIndex;
use Fjord\Crud\Config\CrudConfig;
use Fjord\Crud\Fields\Blocks\Repeatables;
use Illuminate\Database\Eloquent\Builder;

use App\Models\TeamMember;
use FjordApp\Controllers\Crud\TeamMemberController;

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
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Team-Mitglied',
            'plural' => 'Team-Mitglieder',
        ];
    }

    /**
     * Build index table.
     *
     * @param \Fjord\Crud\CrudIndex $table
     * @return void
     */
    public function index(CrudIndex $container)
    {
        $container->table(function ($table) {
            // Build your table colums in here
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

            $table->col('Profession')
              ->value('{profession}')
              ->sortBy('profession');
        })
              // Configure the table.
              ->sortByDefault('name.asc')
              ->sortBy([
                'name.asc' => 'Name A-Z',
                'name.desc' => 'Name Z-A',
              ])
              ->search(['name', 'profession'])
              ->filter([
                  // ...
              ])
              ->query(function ($query) {
                  // Replaces the "indexQuery" method.
              });
    }

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudShow $form
     * @return void
     */
    public function show(CrudShow $form)
    {
        $form->card(function ($form) {
            $this->mainCard($form);
        })
        ->width(12);
    }

    /**
     * Define form sections in methods to keep the overview.
     *
     * @param \Fjord\Crud\CrudShow $form
     * @return void
     */
    protected function mainCard(CrudShow $form)
    {
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
    }
}
