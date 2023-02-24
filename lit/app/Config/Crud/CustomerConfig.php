<?php

namespace Lit\Config\Crud;

use App\Models\Customer;
use Ignite\Crud\Config\CrudConfig;
use Ignite\Crud\CrudIndex;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Crud\CustomerController;

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
     * Model singular and plural name.
     *
     * @param Customer|null customer
     * @return array
     */
    public function names(Customer $customer = null)
    {
        return [
            'singular' => 'Kunde',
            'plural'   => 'Kunden',
        ];
    }

    /**
     * Get crud route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'customers';
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
            $table->col('Name')
                ->value('<b>{name}</b>')
                ->sortBy('name');
            $table->col('Zusatz')
                ->value('{suffix}');
        })->search('name');
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

            $form->group(function ($form) {
                $form->image('image')
                ->title('Logo')
                ->expand()
                ->maxFiles(1);
            })->width(4);

            $form->group(function ($form) {
                $form->input('name')
                ->title('Name')
                ->creationRules('required');

            $form->input('suffix')
                ->title('Zusatz');

            $form->select('category_id')
                ->title('Kategorie')
                ->options([
                    1 => 'Bildung und Forschung',
                    2 => 'Wirtschaft',
                    3 => 'Kunst & Kultur',
                ]);

            $form->input('url')
                ->title('Url')
                ->placeholder('https://')
                ->rules('url')
                ->max(200);

            })->width(8);

            
        });

        $page->card(function ($form) {
            $form->relation('references')
                ->title('Referenzen')
                ->preview(function ($table) {
                    $table->col('{title}');
                });
        });
    }
}
