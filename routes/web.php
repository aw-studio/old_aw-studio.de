<?php

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

Route::trans('/', 'HomeController@index')->name('home');

// Route::trans('/__(routes.home)', HomeController::class)->name('home');

Route::trans('/__(routes.services)', 'ServicesController@index')->name('services');

Route::trans('/__(routes.references)', 'ReferencesController@index')->name('references.index');
Route::trans('/__(routes.references)/{slug}', 'ReferencesController@show')->name('references.show');

Route::trans('/__(routes.studio)', 'StudioController@index')->name('studio');

Route::trans('/__(routes.application)', 'ApplicationController@index')->name('application');

Route::trans('/__(routes.imprint)', 'ImprintController@index')->name('imprint');
Route::trans('/__(routes.datapolicy)', 'DatapolicyController@index')->name('datapolicy');

/**
 * Redirect old routes
 */
Route::get('/team', function () {
    return redirect()->route(app()->getLocale() . '.studio');
});
Route::get('/kontakt', function () {
    return redirect()->route(app()->getLocale() . '.studio');
});
Route::get('/impressum', function () {
    return redirect()->route(app()->getLocale() . '.imprint');
});
Route::get('/showcases', function () {
    return redirect()->route(app()->getLocale() . '.references.index');
});
Route::get('/showcases/planet-power', function () {
    return redirect()->route(app()->getLocale() . '.references.show', ['slug' => 'planet-power']);
});
Route::get('/showcases/habitat-2018', function () {
    return redirect()->route(app()->getLocale() . '.references.show', ['slug' => 'habitat-festival']);
});
Route::get('/showcases/fo-highlight-report', function () {
    return redirect()->route(app()->getLocale() . '.references.show', ['slug' => 'future-ocean-research']);
});
Route::get('/showcases/logos', function () {
    return redirect()->route(app()->getLocale() . '.references.index');
});
Route::get('/showcases/evolung-report', function () {
    return redirect()->route(app()->getLocale() . '.references.show', ['slug' => 'evolung']);
});
Route::get('/showcases/parkettfreund', function () {
    return redirect()->route(app()->getLocale() . '.references.index');
});
Route::get('/showcases/infografik', function () {
    return redirect()->route(app()->getLocale() . '.references.index');
});
Route::get('/showcases/parken-hafen-kiel', function () {
    return redirect()->route(app()->getLocale() . '.references.show', ['slug' => 'parken-zum-hafen']);
});
Route::get('/showcases/tuexen', function () {
    return redirect()->route(app()->getLocale() . '.references.show', ['slug' => 'zahnarzt-dr-tuexen']);
});
Route::get('/showcases/die-holzpiraten', function () {
    return redirect()->route(app()->getLocale() . '.references.show', ['slug' => 'die-holzpiraten']);
});
Route::get('/showcases/technik-gegen-terror', function () {
    return redirect()->route(app()->getLocale() . '.references.show', ['slug' => 'technik-gegen-terror']);
});
Route::get('/showcases/fischdetektive', function () {
    return redirect()->route(app()->getLocale() . '.references.show', ['slug' => 'fischdetektive']);
});
Route::get('/showcases/future-ocean-dialogue', function () {
    return redirect()->route(app()->getLocale() . '.references.show', ['slug' => 'future-ocean-dialogue']);
});
Route::get('/showcases/print', function () {
    return redirect()->route(app()->getLocale() . '.references.index');
});
