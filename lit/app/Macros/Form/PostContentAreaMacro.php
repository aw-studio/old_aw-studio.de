<?php

namespace Lit\Macros\Form;

use Ignite\Crud\BaseForm as Form;
use Lit\Repeatables\BlogTextRepeatable;
use Lit\Repeatables\SectionPostRepeatable;

class PostContentAreaMacro
{
    public function register()
    {
        Form::macro('postContentAreaMacro', function () {
            $this->block('sections')
                ->title('Sections')
                ->repeatables(function ($repeatables) {
                    $repeatables->add(SectionPostRepeatable::class)->button('Blog Section');
                    $repeatables->add(BlogTextRepeatable::class)->button('Text');
                });
        });
    }
}
