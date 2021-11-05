<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Lit\Config\Form\Pages\ApplicationConfig;

class ApplicationController extends Controller
{
    public function index()
    {
        return view('pages.application')->with([
            'application' => ApplicationConfig::load(),
        ]);
    }
}
