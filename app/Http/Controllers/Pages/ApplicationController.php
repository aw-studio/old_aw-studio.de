<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Ignite\Support\Facades\Form;

class ApplicationController extends Controller
{
    public function index()
    {
        return view('pages.application')->with([
            'application' => Form::load('pages', 'application'),
        ]);
    }
}
