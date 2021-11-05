<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Lit\Config\Form\Pages\ImprintConfig;

class ImprintController extends Controller
{
    public function __invoke()
    {
        return view('pages.imprint')->with([
            'imprint' => ImprintConfig::load(),
        ]);
    }
}
