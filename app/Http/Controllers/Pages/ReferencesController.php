<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Ignite\Support\Facades\Form;

class ReferencesController extends Controller
{
    public function __invoke()
    {
        return view('pages.references')->with([
            'form' => Form::load('pages', 'references'),
        ]);
    }
}
