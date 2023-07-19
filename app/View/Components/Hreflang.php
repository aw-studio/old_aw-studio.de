<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Hreflang extends Component
{
    /**
     * The available locales.
     *
     * @var array
     */
    public $locales = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $locales = null)
    {
        if ($locales === null) {
            $this->locales = config('translatable.locales');
        } else {
            $this->locales = $locales;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.hreflang');
    }
}
