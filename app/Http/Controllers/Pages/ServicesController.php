<?php

namespace App\Http\Controllers\Pages;

use Lit\Config\Form\Pages\ServicesConfig;

class ServicesController
{
    public function __invoke()
    {
        return view('pages.services')->with([
            'services' => ServicesConfig::load(),
        ]);
    }
}
