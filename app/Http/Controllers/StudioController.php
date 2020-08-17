<?php

namespace App\Http\Controllers;

use Fjord\Support\Facades\Form;

class StudioController extends Controller
{
    public function index()
    {
        return view('pages.studio')->with([
            'studio' => Form::load('pages', 'studio'),
        ]);
    }
}
