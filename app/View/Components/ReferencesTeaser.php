<?php

namespace App\View\Components;

use Ignite\Support\Facades\Form;
use Illuminate\View\Component;

class ReferencesTeaser extends Component
{
    public $references;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->references = Form::load('collections', 'highlights')->references;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.references-teaser');
    }
}
