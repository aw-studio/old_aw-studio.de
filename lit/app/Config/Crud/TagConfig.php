<?php

namespace Lit\Config\Crud;

use App\Models\Tag;
use Ignite\Crud\Config\CrudConfig;
use Ignite\Crud\CrudIndex;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Crud\TagController;

class TagConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Tag::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = TagController::class;

    /**
     * Model singular and plural name.
     *
     * @param Tag|null tag
     * @return array
     */
    public function names(Tag $tag = null)
    {
        return [
            'singular' => 'Tag',
            'plural'   => 'Tags',
        ];
    }

    /**
     * Get crud route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'tags';
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
