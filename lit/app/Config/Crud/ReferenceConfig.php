<?php

namespace Lit\Config\Crud;

use App\Models\Customer;
use App\Models\Reference;
use App\Models\Service;
use App\Models\Technology;
use Ignite\Crud\Config\CrudConfig;
use Ignite\Crud\CrudIndex;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Crud\ReferenceController;
use Litstack\Deeplable\TranslateAction;
use Litstack\Meta\Traits\FormHasMeta;

class ReferenceConfig extends CrudConfig
{
    use FormHasMeta;

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
            'singular' => 'Referenz',
            'plural'   => 'Referenzen',
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
     * @param  \Ignite\Crud\CrudIndex  $page
     * @return void
     */
    public function index(CrudIndex $page)
    {
        $page->table(function ($table) {
            $table->image('')
                ->src('{image.conversion_urls.sm}')
                ->maxWidth('50px')
                ->small();
            $table->col('Title')
                ->value('<b>{title}</b>')
                ->sortBy('title');

            $table->col('Beschreibung')
                ->value('{subtitle}');

            $table->col('Jahr')
                ->value('{date}');

            $table->field('Live', fn ($column) => $column->sortBy('active'))
                ->boolean('active');
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
        $page->headerRight()
        ->action('Übersetzen', TranslateAction::class)
        ->variant('primary');

        $page->info('Intro')
            ->width(3);
        $page->card(function ($form) {
            $form->boolean('active')
                ->title('Live')
                ->width(1 / 3);
            $form->image('image')
                ->title('Vorschaubild')
                ->expand()
                ->maxFiles(1)
                ->firstBig();

            $form->wysiwyg('excerpt')
                ->title('Vorschau-Text')
                ->translatable();
        })->width(9);

        $page->info('Info')
            ->width(3);
        $page->card(function ($form) {
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
        })->width(9);

        $page->info('Details')
            ->width(3);
        $page->card(function ($form) {
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
        })->width(9);

        $page->info('Daten')
            ->width(3);
        $page->card(function ($form) {
            // $form->oneRelation('customer')
            //     ->title('Kunde')
            //     ->model(Customer::class)
            //     ->preview(function ($preview) {
            //         $preview->col('name');
            //     });

            $form->relation('customers')
                ->title('Kunden')
                ->preview(function ($table) {
                    $table->col('{name}');
                });

            $form->datetime('duration_from')
                    ->title('Laufzeit von')
                    ->formatted('l')
                    ->width(6);
            $form->datetime('duration_to')
                    ->title('Laufzeit bis')
                    ->formatted('l')
                    ->width(6);

            $form->input('budget')->type('number');

            $form->manyRelation('services')
                ->title('Leistungen')
                ->model(Service::class)
                ->preview(function ($preview) {
                    $preview->col('title');
                });

            $form->manyRelation('technologies')
                ->title('Technologien')
                ->model(Technology::class)
                ->preview(function ($preview) {
                    $preview->col('name');
                });
        })->width(9);


        $page->onlyOnUpdate(function ($page) {
            $page->info('SEO')
                ->width(3);
            $page->card(function ($form) {
                $form->seo();
            })->width(9);
        });

    }
}
