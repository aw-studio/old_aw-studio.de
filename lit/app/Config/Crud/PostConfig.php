<?php

namespace Lit\Config\Crud;

use App\Models\Post;
use Ignite\Crud\Config\CrudConfig;
use Ignite\Crud\CrudIndex;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Crud\PostController;
use Litstack\Deeplable\TranslateAction;
use Litstack\Meta\Traits\FormHasMeta;

class PostConfig extends CrudConfig
{
    use FormHasMeta;
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Post::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = PostController::class;

    /**
     * Model singular and plural name.
     *
     * @param Post|null post
     * @return array
     */
    public function names(Post $post = null)
    {
        return [
            'singular' => 'Post',
            'plural'   => 'Posts',
        ];
    }

    /**
     * Get crud route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'posts';
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
        $page->headerRight()
        ->action('Übersetzen', TranslateAction::class)
        ->variant('primary');

        $page->info('Title & Settings')
            ->width(3);
        $page->card(function ($form) {
            $form->input('title')
                ->hint('Der Slug wird aus diesem Titel gebildet')
                ->creationRules('required')
                ->width(10);
            $form->input('slug')
                ->width(6);
            $form->boolean('active')
                ->title('Aktiv/Inaktiv')
                ->width(2);
        })->width(9);

        $page->info('Preview')
            ->width(3);
        $page->card(function ($form) {
            $form->image('image')
                ->maxFiles(1)
                ->expand()
                ->crop(1.6181 / 1)
                ->width(1 / 2);
            $form->text('excerpt')
                ->translatable()
                ->width(1 / 2);
        })->width(9);

        $page->info('Content')
        ->width(3);
        $page->card(function ($form) {
            $form->wysiwyg('h1')
                ->width(10);
            $form->postContentAreaMacro();
        })->width(9);

        $page->info('Tags')
        ->width(3);
        $page->card(function ($form) {
            $form->relation('tags')
                // ->type('tags')
                // ->tagValue('{title}')
                ->sortable()
                ->createAndUpdateForm(function ($form) {
                    $form->input('title')
                        ->translatable(true);
                })
                ->allowLinking();
        })->width(9);

        $page->info('SEO Informations')
            ->width(3);
        $page->card(function ($form) {
            $form->seo();
        })->width(9);
    }
}
