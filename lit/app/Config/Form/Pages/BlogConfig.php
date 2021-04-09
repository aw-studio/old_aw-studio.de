<?php

namespace Lit\Config\Form\Pages;

use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Pages\BlogController;
use Litstack\Meta\Traits\CrudHasMeta;

class BlogConfig extends FormConfig
{
    use CrudHasMeta;
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = BlogController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'pages/blog';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Blog',
        ];
    }

    /**
     * Setup form page.
     *
     * @param  \Lit\Crud\CrudShow $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->info('Intro')
            ->width(3);
        $page->card(function ($form) {
            $form->textarea('h1')->title('Topline')->translatable()->hint('kleine Zeile über der großen Headline (h1)');
            $form->image('image')->title('Bild')->maxFiles(1)->expand();
            $form->textarea('h2')->title('Headline')->translatable()->hint('große Headline (h2)');
            $form->wysiwyg('text_intro')->title('Text Intro')->translatable()->width(6);
        })->width(9);

        $this->meta($page);
    }
}
