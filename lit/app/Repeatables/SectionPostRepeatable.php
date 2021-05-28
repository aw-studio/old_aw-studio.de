<?php

namespace Lit\Repeatables;

use Ignite\Crud\Fields\Block\Repeatable;
use Ignite\Crud\Fields\Block\RepeatableForm;
use Ignite\Page\Table\ColumnBuilder;

class SectionPostRepeatable extends Repeatable
{
    /**
     * Repeatable type.
     *
     * @var string
     */
    protected $type = 'section_post';

    /**
     * The represantive view of the repeatable.
     *
     * @var string
     */
    protected $view = 'rep.sections.post';

    /**
     * Build the repeatable preview.
     *
     * @param  ColumnBuilder $preview
     * @return void
     */
    public function preview(ColumnBuilder $preview): void
    {
        $preview->col('<span class="text-secondary">'.fa('puzzle-piece').' Blog Section</span>');
    }

    /**
     * Build the repeatable form.
     *
     * @param  RepeatableForm $form
     * @return void
     */
    public function form(RepeatableForm $form): void
    {
        $form->range('cols')
            ->title('Elements per Row')
            ->min(1)
            ->max(4)
            ->step(1);

        $form->block('content')
            ->title('Content')
            ->repeatables(function ($repeatables) {
                $repeatables->add(BlogTextRepeatable::class)->button('Text');
                $repeatables->add(BlogImageRepeatable::class)->button('Image');
            });
    }
}
