<?php

namespace Lit\Config\Crud;

use Ignite\Crud\CrudShow;
use Ignite\Crud\CrudIndex;
use Ignite\Crud\Config\CrudConfig;
use Illuminate\Support\Str;

use App\Models\Technology;
use Lit\Http\Controllers\Crud\TechnologyController;

class TechnologyConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Technology::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = TechnologyController::class;

    /**
     * Model singular and plural name.
     *
     * @param Technology|null technology
     * @return array
     */
    public function names(Technology $technology = null)
    {
        return [
            'singular' => 'Technology',
            'plural'   => 'Technologies',
        ];
    }

    /**
     * Get crud route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'technologies';
    }

    /**
     * Build index page.
     *
     * @param \Ignite\Crud\CrudIndex $page
     * @return void
     */
    public function index(CrudIndex $page)
    {
        $page->table(function ($table) {

            $table->col('Name')->value('{name}')->sortBy('name');

        })->search('name');  
    }

    /**
     * Setup show page.
     *
     * @param \Ignite\Crud\CrudShow $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->info('Technologie')->width(3);
        $page->card(function($form) {

            $form->input('name')->creationRules('required');
            $form->wysiwyg('text');
            $form->input('version');
            $form->input('url')->type('url');
            $form->image('image')->maxFiles(1);
            
        })->width(9);
    }
}
