<?php

namespace Lit\Config\Crud;

use App\Models\Post;
use Ignite\Crud\Config\CrudConfig;
use Ignite\Crud\CrudIndex;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Crud\PostController;
use Litstack\Meta\Traits\CrudHasMeta;

class PostConfig extends CrudConfig
{
    use CrudHasMeta;
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
        $page->info('Autor:in: {lit_user_username}');
        $page->card(function ($form) {
            $form->wysiwyg('title')
                ->hint('Der Slug wird aus diesem Titel gebildet')
                ->creationRules('required')
                ->width(10);

            $form->boolean('active')
                ->title('Aktiv/Inaktiv')
                ->width(2);

            $form->wysiwyg('excerpt')
                ->translatable();

            $form->image('image')
                ->maxFiles(1)
                ->expand()
                ->crop(1.6181 / 1);
            // $form->modal('change_slug')
            //     ->title('Slug')
            //     ->variant('primary')
            //     ->preview($this->routePrefix() . '/<b>{' . $this->getSlugColumnName() . '}</b>')
            //     ->name('Change Slug')
            //     ->form(function ($modal) {
            //         $modal->input($this->getSlugColumnName())
            //             ->width(12)
            //             ->title('Slug');
            //     })->width(4);

            // $this->prependForm($form);
        });

        $page->card(function ($form) {
            $form->postContentAreaMacro();
        });

        $page->card(function ($form) {
            $form->relation('tags')
                ->type('tags')
                ->tagValue('{title}');
        });

        $this->meta($page);
    }
}
