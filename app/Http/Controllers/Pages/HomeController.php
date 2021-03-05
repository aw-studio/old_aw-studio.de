<?php

namespace App\Http\Controllers\Pages;

use Ignite\Support\Facades\Form;

class HomeController
{
    public function __invoke()
    {
        return view('pages.home')->with([
            'form' => Form::load('pages', 'home'),
        ]);
    }
}
