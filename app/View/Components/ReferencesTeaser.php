<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ReferencesTeaser extends Component
{
    public $references;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($references)
    {
        $this->references = $references;
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
