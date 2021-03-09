<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Ignite\Support\Facades\Form;

class DatapolicyController extends Controller
{
    public function __invoke()
    {
        return view('pages.datapolicy')->with([
            'datapolicy' => Form::load('pages', 'datapolicy'),
        ]);
    }
}
