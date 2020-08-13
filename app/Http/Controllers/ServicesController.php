<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Fjord\Support\Facades\Form;

class ServicesController extends Controller
{
    public function index() {
      return view('pages.services')->with([
          'services' => Form::load('pages', 'services')
      ]);
    }
}
