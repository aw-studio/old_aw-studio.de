<?php

namespace App\Http\Controllers\Pages;

use App\Models\Post;
use Lit\Config\Form\Pages\HomeConfig;
use Lit\Config\Form\Collections\HighlightsConfig;

class HomeController
{
    public function __invoke()
    {
        return view('pages.home')->with([
            'form'       => HomeConfig::load(),
            'posts'      => Post::whereActive(1)->take(2)->get(),
            'highlights' => HighlightsConfig::load(),
        ]);
    }
}
