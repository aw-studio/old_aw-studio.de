<?php

namespace FjordApp\Config\Crud;

use Fjord\Crud\CrudShow;
use Fjord\Crud\CrudIndex;
use Fjord\Crud\Config\CrudConfig;
use Fjord\Crud\Fields\Blocks\Repeatables;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Reference;
use FjordApp\Controllers\Crud\ReferenceController;

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
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Referenz',
            'plural' => 'Referenzen',
        ];
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
            // Build your table colums in here
            $table->col('Title')
                ->value('<b>{title}</b>')
                ->sortBy('title');

            $table->col('Beschreibung')
                ->value('{subtitle}');

            $table->col('Jahr')
                ->value('{date}');

            $table->image('Image')
                  ->src('{image.conversion_urls.sm}')
                  ->maxWidth('50px')
                  ->small();
        })
            // Configure the table.
            ->sortByDefault('title.asc')
            ->sortBy([
                'title.asc' => 'A-Z',
                'title.desc' => 'Z-A',
            ])
            ->search(['title'])
            ->filter([
                // ...
            ])
            ->perPage(50)
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
            $form->group(function ($form) {
                $form->image('image')
              ->title('Vorschaubild')
              ->expand()
              ->width(12)
              ->maxFiles(1)
              ->firstBig();

                $form->wysiwyg('excerpt')
              ->title('Vorschau-Text')
              ->translatable()
              ->width(12);
            })->width(4);

            $form->group(function ($form) {
                $form->input('title')
                ->title('Titel')
                ->translatable()
                ->creationRules('required')
                ->width(12);

                $form->input('subtitle')
                ->title('Unterzeile')
                ->translatable()
                ->width(12);

                $form->input('date')
                ->title('Jahr')
                ->width(6);

                $form->wysiwyg('buzzwords')
                ->title('Buzzwords')
                ->translatable()
                ->width(12);

                $form->wysiwyg('text')
                ->title('Beschreibung')
                ->translatable()
                ->width(12);

                $form->input('link_href')
                ->title('Link Href')
                ->placeholder('https://')
                ->width(12);

                $form->input('link_text')
                ->title('Link Text')
                ->placeholder('z.B. zur Website')
                ->translatable()
                ->width(6);
            })->width(8);
        })->width(12);

        $form->card(function ($form) {
            $form->block('details')
            ->title('Details')
            ->repeatables(function ($repeatables) {
                $repeatables->add('image_1xfull', function ($form, $preview) {
                    $preview->image('image')
                        ->src('{image.conversion_urls.sm}')
                        ->maxWidth('150px')
                        ->small();
                    $preview->col('{text}');

                    $form->image('image')
                        ->title('')
                        ->expand()
                        ->maxFiles(1);
                });

                $repeatables->add('image_2xhalf', function ($form, $preview) {
                    $preview->image('image')
                          ->src('{image1.conversion_urls.sm}')
                          ->maxWidth('50px')
                          ->small();
                    $preview->image('image')
                          ->src('{image2.conversion_urls.sm}')
                          ->maxWidth('50px')
                          ->small();
                    $preview->col('{text}');

                    $form->image('image1')
                        ->title('')
                        ->expand()
                        ->maxFiles(1)
                        ->width(6);
                    $form->image('image2')
                        ->title('')
                        ->expand()
                        ->maxFiles(1)
                        ->width(6);
                });

                $repeatables->add('text', function ($form, $preview) {
                    $preview->col('{text}');

                    $form->wysiwyg('text')
                        ->title('Text');
                });
            });
        })->width(12);
    }
}
