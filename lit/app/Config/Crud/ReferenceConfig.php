<?php

namespace Lit\Config\Crud;

use App\Models\Reference;
use Ignite\Crud\Config\CrudConfig;
use Ignite\Crud\CrudIndex;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Crud\ReferenceController;

class ReferenceConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Reference::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = ReferenceController::class;

    /**
     * Model singular and plural name.
     *
     * @param Reference|null reference
     * @return array
     */
    public function names(Reference $reference = null)
    {
        return [
            'singular' => 'Reference',
            'plural'   => 'References',
        ];
    }

    /**
     * Get crud route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'references';
    }

    /**
     * Build index page.
     *
     * @param  \Ignite\Crud\CrudIndex $page
     * @return void
     */
    public function index(CrudIndex $page)
    {
        $page->table(function ($table) {
            $table->col('Title')->value('{title}')->sortBy('title');
        })->search('title');
    }

    /**
     * Setup show page.
     *
     * @param  \Ignite\Crud\CrudShow $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->card(function ($form) {
            $form->input('title');
        });
    }
}
