<?php

namespace App\Http\Controllers\Pages;

use App\Models\Post;
use Ignite\Support\Facades\Form;

class HomeController
{
    public function __invoke()
    {
        return view('pages.home')->with([
            'form'       => Form::load('pages', 'home'),
            'posts'      => Post::whereActive(1)->take(2)->get(),
            'highlights' => Form::load('collections', 'highlights'),
        ]);
    }
}
