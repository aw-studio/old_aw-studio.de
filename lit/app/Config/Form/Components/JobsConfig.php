<?php

namespace Lit\Config\Form\Components;

use App\Models\JobOffer;
use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Components\JobsController;

class JobsConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = JobsController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'components/jobs';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Jobs-Komponente',
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
        $page->info('Einbindung')
            ->width(3)
            ->text('Diese Komponente wird automatisch auf der Startseite sowie auf der Studio-Seite eingebunden');
        $page->card(function ($form) {
            $form->input('h3_jobs')->title('Headline')->translatable();
        })->width(9);

        $page->info('Job-Angebote')
        ->width(3)
        ->text('Angelegte Job-Angebote können hier verknüpft werden. <a href="/admin/job-offers">Neues Job-Angebot anlegen</a>');
        $page->card(function ($form) {
            $form->wysiwyg('text_job_offers')->title('Text')->translatable();

            $form->manyRelation('job_offers')
                ->model(JobOffer::class)
                ->sortable()
                ->preview(function ($table) {
                    $table->col('Title')
                        ->value('{title}')
                        ->sortBy('title');
                })->title('Job-Angebote');
        })->width(9);

        $page->info('Initiativ-Bewerbungen')
        ->width(3)
        ->text('Der Button verlinkt zur Seite <a href="/admin/pages/application">Bewerbung</a>');
        $page->card(function ($form) {
            $form->wysiwyg('text_jobs')->title('Text')->translatable();
            $form->wysiwyg('list_jobs')->title('List')->translatable();
            $form->input('button_jobs')->title('Button')->translatable()->width(6);
        })->width(9);
    }
}
