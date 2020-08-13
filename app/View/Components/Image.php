<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Image extends Component
{

    /**
     * The image.
     *
     * @var string
     */
    public $image;

    /**
     * The images alt text.
     *
     * @var string
     */
    public $alt;

    /**
     * css classes for the image.
     *
     * @var string
     */
    public $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($image, $alt = '', $class = '')
    {
        $this->image = $image;
        $this->alt = $alt;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.image');
    }
}
