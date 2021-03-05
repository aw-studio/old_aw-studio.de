<?php

namespace Lit\Repeatables;

use Ignite\Crud\Fields\Block\Repeatable;
use Ignite\Crud\Fields\Block\RepeatableForm;
use Ignite\Page\Table\ColumnBuilder;
use Litstack\Bricks\Repeatables\TextRepeatable;

class SectionStickyRepeatable extends Repeatable
{
    /**
     * Repeatable type.
     *
     * @var string
     */
    protected $type = 'section_sticky';

    /**
     * The represantive view of the repeatable.
     *
     * @var string
     */
    protected $view = 'rep.section_sticky';

    /**
     * Build the repeatable preview.
     *
     * @param  ColumnBuilder $preview
     * @return void
     */
    public function preview(ColumnBuilder $preview): void
    {
        $preview->col('<span class="text-secondary">' . fa('puzzle-piece') . ' Sticky Section</span>');
    }

    /**
     * Build the repeatable form.
     *
     * @param  RepeatableForm $form
     * @return void
     */
    public function form(RepeatableForm $form): void
    {
        $form->input('headline');
        $form->wysiwyg('text');
        $form->boolean('dark');

        $form->block('content')
            ->title('Content')
            ->repeatables(function ($repeatables) {
                $repeatables->add(TextRepeatable::class)->button('Text');
            });
    }
}
