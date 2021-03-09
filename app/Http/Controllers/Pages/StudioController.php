<?php

namespace App\Http\Controllers\Pages;

use Ignite\Support\Facades\Form;

class StudioController
{
    public function __invoke()
    {
        return view('pages.studio')->with([
            'studio' => Form::load('pages', 'studio'),
        ]);
    }
}
