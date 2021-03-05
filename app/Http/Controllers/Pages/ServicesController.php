<?php

namespace App\Http\Controllers\Pages;

use Ignite\Support\Facades\Form;

class ServicesController
{
    public function __invoke()
    {
        return view('pages.services')->with([
            'form' => Form::load('pages', 'services'),
        ]);
    }
}
