<?php

namespace Lit\Macros\Form;

use Ignite\Crud\BaseForm as Form;
use Lit\Repeatables\SectionPostRepeatable;

class PostContentAreaMacro
{
    public function register()
    {
        Form::macro('postContentAreaMacro', function () {
            $this->input('h1')
                ->translatable()
                ->title('H1');

            $this->wysiwyg('excerpt')
                ->translatable();

            $this->image('image');

            $this->block('sections')
                ->title('Sections')
                ->repeatables(function ($repeatables) {
                    $repeatables->add(SectionPostRepeatable::class)->button('Blog Section');
                });
        });
    }
}
