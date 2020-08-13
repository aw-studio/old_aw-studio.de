<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Fjord\Support\Facades\Form;

class ReferencesTeaser extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $highlights = Form::load('collections', 'highlights');
        return view('components.references-teaser')->with([
          'highlights' => $highlights
        ]);
    }
}
