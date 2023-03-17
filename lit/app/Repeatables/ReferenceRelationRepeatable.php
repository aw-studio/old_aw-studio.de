<?php

namespace Lit\Repeatables;

use App\Models\Reference;
use Ignite\Crud\Fields\Block\Repeatable;
use Ignite\Crud\Fields\Block\RepeatableForm;
use Ignite\Page\Table\ColumnBuilder;

class ReferenceRelationRepeatable extends Repeatable
{
    /**
     * Repeatable type.
     *
     * @var string
     */
    protected $type = 'reference_relation';

    /**
     * The represantive view of the repeatable.
     *
     * @var string
     */
    protected $view = 'rep.reference_relation';

    /**
     * Build the repeatable preview.
     *
     * @param  ColumnBuilder  $preview
     * @return void
     */
    public function preview(ColumnBuilder $preview): void
    {
        $preview->col('<span class="text-secondary">'.fa('puzzle-piece').' Reference Repeatable</span>');
    }

    /**
     * Build the repeatable form.
     *
     * @param  RepeatableForm  $form
     * @return void
     */
    public function form(RepeatableForm $form): void
    {
        // $form->oneRelation('reference')
        //     ->title('Reference')
        //     ->model(Reference::class)
        //     ->preview(function ($table) {
        //         $table->col('title');
        //     });
    }
}
