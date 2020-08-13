<?php

namespace FjordApp\Config\Crud;

use Fjord\Crud\CrudShow;
use Fjord\Crud\CrudIndex;
use Fjord\Crud\Config\CrudConfig;
use Fjord\Crud\Fields\Blocks\Repeatables;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Customer;
use FjordApp\Controllers\Crud\CustomerController;

class CustomerConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Customer::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = CustomerController::class;

    /**
     * Index table sort by default.
     *
     * @var string
     */
    public $sortByDefault = 'name.asc';

    /**
     * Model singular and plural name.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Kunde',
            'plural' => 'Kunden',
        ];
    }

    /**
     * Sort by keys.
     *
     * @return array
     */
    public function sortBy()
    {
        return;
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
            $table->col('Name')
                ->value('<b>{name}</b>')
                ->sortBy('name')
                ->small();
            $table->col('Zusatz')
                ->value('{suffix}');

            $table->component('customer-category')
                ->label('Kategorie')
                // ->prop('variants' => [
                //     'active' => 'success',
                //     'complete' => 'primary',
                //     'failed' => 'danger'
                // ])
                ->sortBy('category_id');
        })
            ->sortBy([
                'name.asc' => 'A-Z',
                'name.desc' => 'Z-A',
            ])
            ->search('title')
            ->perPage(25)
            ->filter([
                // Filter have to be in groups.
                'Kategorie' => [

                    // Use scopes as filter.
                    'Research' => 'Bildung & Forschung',
                    'Industry' => 'Wirtschaft',
                    'Culture' => 'Kunst & Kultur',
                ],
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
        })->width(12);
    }

    /**
     * Define form sections in methods to keep the overview.
     *
     * @param \Fjord\Crud\CrudShow $form
     * @return void
     */
    protected function mainCard(CrudShow $form)
    {
        $form->input('name')
            ->title('Name')
            ->creationRules('required')
            ->width(6);

        $form->input('suffix')
            ->title('Zusatz')
            ->width(6);

        $form->select('category_id')
            ->title('Kategorie')
            ->options([
                1 => 'Bildung und Forschung',
                2 => 'Wirtschaft',
                3 => 'Kunst & Kultur'
            ])->width(6);

        $form->input('url')
            ->title('Url')
            ->placeholder('https://')
            ->rules('url')
            ->max(200)
            ->width(12);
    }
}
