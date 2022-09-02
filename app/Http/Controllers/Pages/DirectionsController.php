<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Lit\Config\Form\Pages\DirectionsConfig;

class DirectionsController extends Controller
{
    public function __invoke()
    {
        return view('pages.directions')->with([
            'directions' => DirectionsConfig::load(),
        ]);
    }
}
