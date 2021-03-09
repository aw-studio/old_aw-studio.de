<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Ignite\Support\Facades\Form;

class ImprintController extends Controller
{
    public function __invoke()
    {
        return view('pages.imprint')->with([
            'imprint' => Form::load('pages', 'imprint'),
        ]);
    }
}
