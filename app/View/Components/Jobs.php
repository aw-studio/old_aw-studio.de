<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Fjord\Support\Facades\Form;

class Jobs extends Component
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
        return view('components.jobs')->with([
          'jobs' => Form::load('components', 'jobs')
        ]);
    }
}
