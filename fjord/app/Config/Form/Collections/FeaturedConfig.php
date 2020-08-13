<?php

namespace FjordApp\Config\Form\Collections;

use Fjord\Crud\CrudShow;
use App\Models\Reference;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Collections\FeaturedController;

class FeaturedConfig extends FormConfig
{

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = FeaturedController::class;

    /**
     * Model singular and plural name.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Featured',
        ];
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
            $form->manyRelation('references')
                ->title('Referenzen')
                ->model(Reference::class)
                ->perPage(100)
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
        })->width(12);
    }
}
