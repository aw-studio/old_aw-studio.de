<?php

namespace App\Http\Controllers;

use Fjord\Support\Facades\Form;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home')->with([
            'home' => Form::load('pages', 'home'),
        ]);
    }
}
