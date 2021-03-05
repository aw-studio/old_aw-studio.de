<?php

use Ignite\Support\Facades\Form;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

if (App::environment('local')) {
    // only available during development
    Route::get('/master', function () {
        return view('master')->with([
            'form' => Form::load('pages', 'master'),
        ]);
    });
}
