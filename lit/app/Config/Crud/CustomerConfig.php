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
            $table->image('')
                ->src('{image.conversion_urls.sm}')
                ->maxWidth('80px')
                ->small();
            $table->col('Name')
                ->value('<b>{name}</b>')
                ->sortBy('name');
            $table->col('Zusatz')
                ->value('{suffix}');
            $table->field('Active', fn ($column) => $column->sortBy('active'))
                ->boolean('active');
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

                $form->boolean('logo_wall')
                ->title('Name Drop in Logowall');

                $form->range('logo_scale')
                ->title('Skalierung in Logowall')
                ->min(10)
                ->max(120)
                ->step(5)
                ->hint('Skalierung in %');
            })->width(4);

            $form->group(function ($form) {
                $form->input('name')
                ->title('Name')
                ->creationRules('required');

                $form->boolean('active')
                ->title('Aktiv');

                $form->input('suffix')
                ->title('Zusatz');

                $form->wysiwyg('description')
                ->title('Beschreibung');

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
