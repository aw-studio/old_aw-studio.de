<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Fjord\Support\Facades\Form;

class Meta extends Component
{
    public $metaTitle;
    public $metaDescription;
    public $metaKeywords;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($metaTitle = null, $metaDescription = null, $metaKeywords = null)
    {
        $settings = null;
        if (empty($metaTitle) || empty($metaDescription) || empty($metaKeywords)) {
            $settings = Form::load('collections', 'settings');
        }

        $this->metaTitle = !empty($metaTitle) ? $metaTitle : $settings->metaTitle;
        $this->metaDescription = !empty($metaDescription) ? $metaDescription : $settings->metaDescription;
        $this->metaKeywords = !empty($metaKeywords) ? $metaKeywords : $settings->metaKeywords;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.meta');
    }
}
