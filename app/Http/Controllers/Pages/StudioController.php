<?php

namespace App\Http\Controllers\Pages;

use Ignite\Support\Facades\Form;

class StudioController
{
    public function __invoke()
    {
        return view('pages.studio')->with([
            'form' => Form::load('pages', 'studio'),
        ]);
    }
}
