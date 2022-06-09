<?php

namespace Lit\Config\Crud;

use App\Models\JobOffer;
use Ignite\Crud\CrudShow;
use Ignite\Crud\CrudIndex;
use Ignite\Crud\Config\CrudConfig;
use Litstack\Meta\Traits\FormHasMeta;
use Lit\Http\Controllers\Crud\JobOfferController;

class JobOfferConfig extends CrudConfig
{

    use FormHasMeta;
    /**
     * Model class.
     *
     * @var string
     */
    public $model = JobOffer::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = JobOfferController::class;

    /**
     * Model singular and plural name.
     *
     * @param JobOffer|null jobOffer
     * @return array
     */
    public function names(JobOffer $jobOffer = null)
    {
        return [
            'singular' => 'Job-Angebot',
            'plural'   => 'Job-Angebote',
        ];
    }

    /**
     * Get crud route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'job-offers';
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

            $table->col('Status')->value('active', [
                true => '<span class="badge badge-success"”">aktiv</span>',
                false => '<span class="badge badge-warning"”">deaktiviert</span>',
            ])->sortBy('active')->small();

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
        $page->info('Inhalt')
        ->width(3);
        $page->card(function ($form) {
            $form->boolean('active')->title('Aktiv');
            $form->input('title')->title('Job-Bezeichnung')->translatable();
            $form->wysiwyg('description')->title('Stellenbeschreibung')->translatable();

        })->width(9);;

        $page->info('SEO Informations')
        ->width(3);
        $page->card(function ($form) {
            $form->seo();
        })->width(9);
    }
    
}
