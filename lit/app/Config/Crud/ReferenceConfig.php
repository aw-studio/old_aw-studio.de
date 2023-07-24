<?php

namespace Lit\Config\Crud;

use App\Models\Customer;
use App\Models\Reference;
use App\Models\Service;
use App\Models\Technology;
use Ignite\Crud\Config\CrudConfig;
use Ignite\Crud\CrudIndex;
use Ignite\Crud\CrudShow;
use Lit\Actions\DownloadReferencePdfAction;
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

        $page->headerRight()
        ->action('Download PDF', DownloadReferencePdfAction::class)
        ->variant('primary');

        $page->info('Intro')
            ->width(3);
        $page->card(function ($form) {
            $form->group(function ($form) {
                $form->boolean('active')
                ->title('Live')
                ->width(1 / 3);

                $form->input('title')
                ->title('Titel')
                ->translatable()
                ->creationRules('required')
                ->width(12);

                $form->input('subtitle')
                    ->title('Unterzeile')
                    ->translatable()
                    ->width(12);
            })->width(6);

            $form->group(function ($form) {
                $form->image('image')
                ->title('Vorschaubild')
                ->expand()
                ->maxFiles(1);
            })->width(6);

            $form->wysiwyg('excerpt')
                ->title('Vorschau-Text')
                ->translatable();
        })->width(9);

        $page->info('Überblick')
            ->width(3);
        $page->card(function ($form) {
            $form->input('date')
                ->title('Umsetzung (Jahr/e)');
            $form->relation('customers')
    ->title('Auftraggeber')
    ->preview(function ($table) {
        $table->col('{name}');
    });
        })->width(9);

        $page->info('Beschreibung')
        ->width(3);
        $page->card(function ($form) {
            $form->wysiwyg('text')
            ->title('Einleitung')
            ->translatable()
            ->width(12);
            $form->wysiwyg('buzzwords')
            ->title('Merkmale / Features')
            ->translatable()
            ->width(12);

            $form->input('link_href')
            ->title('Link Href')
            ->placeholder('https://')
            ->width(6);

            $form->input('link_text')
                ->title('Link Text')
                ->placeholder('z.B. zur Website')
                ->translatable()
                ->width(6);
        })->width(9);

        $page->info('Leistungen')
        ->width(3);
        $page->card(function ($form) {
            $form->manyRelation('services')
            ->title('Erbrachte Leistungen')
            ->model(Service::class)
            ->sortable()
            ->preview(function ($preview) {
                $preview->col('title');
            });
        })->width(9);

        $page->info('Technologien')
        ->width(3);
        $page->card(function ($form) {
            $form->manyRelation('technologies')
            ->title('Eingesetzte Technologien')
            ->model(Technology::class)
            ->sortable()
            ->preview(function ($preview) {
                $preview->col('name');
            });
        })->width(9);

        $page->info('Bilder & Details')
            ->width(3);
        $page->card(function ($form) {
            $form->block('details')
                ->title('Bilder & ggf. weitere Details')
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

                    $repeatables->add('video', function ($form, $preview) {
                        $preview->col('Vimeo Video: {video_id}');

                        $form->input('video_id')
                            ->title('Vimeo-ID');
                    });
                });
        })->width(9);

        $page->info('Ausschreibungen')
        ->width(3);
        $page->card(function ($form) {

            $form->datetime('duration_from')
            ->title('Bearbeitung von')
            ->formatted('l')
            ->width(4)->hint('Projekt-Beginn');
            $form->datetime('duration_to')
                    ->title('Bearbeitung bis')
                    ->formatted('l')
                    ->width(4)->hint('Projekt-Ende');

            $form->input('budget')->title('Auftragswert')->type('number')->append('€')->width(4)->hint('ungefährer Auftragswert');

            $form->group(function ($form) {
                $form->textarea('client')->title('Auftraggeber')->hint('Name und Adresse des Auftraggebers');
            })->width(6);

            $form->group(function ($form) {
                $form->input('client_email')->title('E-Mail')->hint('allgemeine / öffentliche E-Mail-Adresse');
                $form->input('client_phone')->title('Telefon')->hint('allgemeine / öffentliche Telefonnummer');
                $form->input('client_contact_person')->title('Ansprechperson')->hint('unsere Haupt-Ansprechperson auf Kundenseite');            
            })->width(6);
            
        })->width(9);

        $page->info('')->text('<div class="d-flex justify-content-end" style="margin-bottom:30px;"><a href="/reference-pdf/{slug}" target="_blank" download>PDF herunterladen</a>&nbsp;&nbsp;&nbsp; <a href="/reference-pdf/{slug}?tender=true" target="_blank" download>Ausschreibungs-PDF</a></div>')
            ->width(12);


        $page->onlyOnUpdate(function ($page) {
            $page->info('SEO')
                ->width(3);
            $page->card(function ($form) {
                $form->seo();
            })->width(9);
        });
    }
}
