<?php

namespace App\Http\Controllers;

use Fjord\Support\Facades\Form;

class ApplicationController extends Controller
{
    public function index()
    {
        return view('pages.application')->with([
            'application' => Form::load('pages', 'application'),
        ]);
    }
}
