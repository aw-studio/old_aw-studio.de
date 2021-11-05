<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Lit\Config\Form\Pages\DatapolicyConfig;

class DatapolicyController extends Controller
{
    public function __invoke()
    {
        return view('pages.datapolicy')->with([
            'datapolicy' => DatapolicyConfig::load(),
        ]);
    }
}
