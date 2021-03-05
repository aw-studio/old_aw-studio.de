<?php

namespace Lit\Macros\Form;

use Ignite\Crud\BaseForm as Form;
use Lit\Repeatables\SectionDefaultRepeatable;
use Lit\Repeatables\SectionStickyRepeatable;

class ContentAreaMacro
{
    public function register()
    {
        Form::macro('contentAreaMacro', function () {
            $this->input('h1')->title('Headline');

            $this->block('sections')
                ->title('Sections')
                ->repeatables(function ($repeatables) {
                    $repeatables->add(SectionDefaultRepeatable::class)->button('Default Section');
                    $repeatables->add(SectionStickyRepeatable::class)->button('Sticky Section');
                });
        });
    }
}
