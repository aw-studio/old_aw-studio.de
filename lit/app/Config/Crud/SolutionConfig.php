<?php

namespace Lit\Config\Crud;

use App\Models\Reference;
use App\Models\Solution;
use Ignite\Crud\Config\CrudConfig;
use Ignite\Crud\CrudIndex;
use Ignite\Crud\CrudShow;
use Illuminate\Support\Str;
use Lit\Http\Controllers\Crud\SolutionController;

class SolutionConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Solution::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = SolutionController::class;

    /**
     * Model singular and plural name.
     *
     * @param Solution|null solution
     * @return array
     */
    public function names(Solution $solution = null)
    {
        return [
            'singular' => 'Lösung',
            'plural'   => 'Lösungen',
        ];
    }

    /**
     * Get crud route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'solutions';
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
            $table->col('Title')->value('{title}')->sortBy('title');
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
        $page->info('Content')
        ->width(3);
        $page->card(function ($form) {
            $form->input('title')->width(9);
            $form->boolean('active')->width(3);
            // $form->image('image')->hint('SVG Image')->width(5);
            $form->textarea('svg');
            $form->wysiwyg('list')->width(8);
            $form->wysiwyg('text')->width(8);
        })->width(9);

        $page->info('Referenzen')
        ->width(3);
        $page->card(function ($form) {
            $form->manyRelation('references')
                ->title('Referenzen')
                ->model(Reference::class)
                ->sortable()
                ->preview(function ($table) {
                    $table->image('Image')
                        ->src('{image.conversion_urls.sm}')
                        ->maxWidth('50px')
                        ->small();

                    $table->col('Title')
                        ->value('{title}')
                        ->sortBy('title');
                });
        })->width(9);
    }
}
