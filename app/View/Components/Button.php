<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{

    /**
     * The button type (dark or light).
     *
     * @var string
     */
    public $type;

    /**
     * The button text.
     *
     * @var string
     */
    public $text;

    /**
     * The button link.
     *
     * @var string
     */
    public $link;

    /**
     * The link target
     *
     * @var string
     */
    public $target;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $text, $link, $target = '_self')
    {
        $this->type = $type;
        $this->text = $text;
        $this->link = $link;
        $this->target = $target;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.button');
    }
}
