<?php

namespace Lit\Config\Form\Collections;

use App\Models\Reference;
use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Collections\HighlightsController;

class HighlightsConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = HighlightsController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'collections/highlights';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Highlights',
        ];
    }

    /**
     * Setup form page.
     *
     * @param  \Lit\Crud\CrudShow  $page
     * @return void
     */
    public function show(CrudShow $page)
    {
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
        });
    }
}
