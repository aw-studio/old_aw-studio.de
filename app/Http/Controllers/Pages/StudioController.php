<?php

namespace App\Http\Controllers\Pages;

use Lit\Config\Form\Pages\StudioConfig;

class StudioController
{
    public function __invoke()
    {
        return view('pages.studio')->with([
            'studio' => StudioConfig::load(),
        ]);
    }
}
