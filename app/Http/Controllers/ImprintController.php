<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImprintController extends Controller
{
    public function index()
    {
        return view('pages.imprint');
    }
}
