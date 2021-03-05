<?php

use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\ServicesController;
use App\Http\Controllers\Pages\StudioController;
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

Route::trans('/', HomeController::class)->name('home');
Route::trans('/__(routes.services)', ServicesController::class)->name('services');
Route::trans('/__(routes.studio)', StudioController::class)->name('studio');
