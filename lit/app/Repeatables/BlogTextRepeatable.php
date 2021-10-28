<?php

namespace Lit\Repeatables;

use Ignite\Crud\Fields\Block\Repeatable;
use Ignite\Crud\Fields\Block\RepeatableForm;
use Ignite\Page\Table\ColumnBuilder;

class BlogTextRepeatable extends Repeatable
{
    /**
     * Repeatable type.
     *
     * @var string
     */
    protected $type = 'blog_text';

    /**
     * The represantive view of the repeatable.
     *
     * @var string
     */
    protected $view = 'rep.blog.text';

    /**
     * Build the repeatable preview.
     *
     * @param  ColumnBuilder  $preview
     * @return void
     */
    public function preview(ColumnBuilder $preview): void
    {
        $preview->col('<span class="text-secondary">'.fa('quote-right').' Text</span>');
    }

    /**
     * Build the repeatable form.
     *
     * @param  RepeatableForm  $form
     * @return void
     */
    public function form(RepeatableForm $form): void
    {
        $form->wysiwyg('text')->title('Text');
    }
}
