<?php

namespace App\Http\Controllers\Pages;

use App\Models\Post;
use App\Models\Solution;
use Lit\Config\Form\Collections\HighlightsConfig;
use Lit\Config\Form\Pages\HomeConfig;

class HomeController
{
    public function __invoke()
    {
        return view('pages.home')->with([
            'form'       => HomeConfig::load(),
            'posts'      => Post::whereActive(1)->inRandomOrder()->take(2)->get(),
            'highlights' => HighlightsConfig::load(),
            'solutions' => Solution::whereActive(1)->get(),
        ]);
    }
}
