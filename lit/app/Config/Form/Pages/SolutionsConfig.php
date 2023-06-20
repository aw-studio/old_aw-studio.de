<?php

namespace Lit\Config\Form\Pages;

use App\Models\Solution;
use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Pages\SolutionsController;

class SolutionsConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = SolutionsController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return "pages/solutions";
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Lösungen',
        ];
    }

    /**
     * Setup form page.
     *
     * @param \Lit\Crud\CrudShow $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->info('Intro')
            ->width(3);
        $page->card(function ($form) {
            $form->input('h1')->title('Topline')->translatable();
            $form->textarea('h2')->title('Headline')->translatable()->hint('große Headline (h2)');
            $form->wysiwyg('text_intro')->title('Text Intro')->translatable()->width(12);
        })->width(9);

        $page->info('Lösungen')
            ->width(3);
        $page->card(function ($form) {
            $form->group(function ($form) {
                $form->manyRelation('solutions')
                ->model(Solution::class)
                ->sortable()
                ->perPage(30)
                ->preview(function ($table) {
                    $table->col('Title')
                        ->value('{title}')
                        ->sortBy('title');
                });
            });
        })->width(9);
    }
}
