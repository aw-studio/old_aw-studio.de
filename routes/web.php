<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\JobOffersController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Pages\ApplicationController;
use App\Http\Controllers\Pages\CustomersController;
use App\Http\Controllers\Pages\DatapolicyController;
use App\Http\Controllers\Pages\DirectionsController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\ImprintController;
use App\Http\Controllers\Pages\ReferencesController;
use App\Http\Controllers\Pages\ServicesController;
use App\Http\Controllers\Pages\SolutionsController;
use App\Http\Controllers\Pages\StudioController;
use App\Http\Controllers\ReferencesPdfController;
use App\Http\Controllers\ServiceController;
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

// if (App::environment('local')) {
//     // only available during development
//     Route::get('/master', function () {
//         return view('master')->with([
//             'form' => Form::load('pages', 'master'),
//         ]);
//     });
// }

Route::trans('/', HomeController::class)->name('home');
Route::trans('/__(routes.references)', ReferencesController::class.'@index')->name('references.index');
Route::trans('/__(routes.references)/{slug}', ReferencesController::class.'@show')->translator('getReferenceSlug')->name('references.show');
Route::trans('/__(routes.references-az)', ReferencesController::class.'@az')->name('references.a-z');

Route::trans('/__(routes.services)', ServicesController::class)->name('services');
Route::trans('/__(routes.services)/{slug}', ServiceController::class.'@show')->translator('getServiceSlug')->name('services.show');

Route::trans('/__(routes.studio)', StudioController::class)->name('studio');

Route::trans('/__(routes.blog)', BlogController::class.'@index')->name('blog.index');
Route::trans('/__(routes.blog)/{slug}', BlogController::class.'@show')->translator('getPostSlug')->name('blog.show');

Route::trans('/__(routes.customers)', CustomersController::class.'@index')->name('customers.index');
Route::trans('/__(routes.customers)/{slug}', CustomersController::class.'@show')->translator('getCustomerSlug')->name('customers.show');

Route::trans('/__(routes.solutions)', SolutionsController::class.'@index')->name('solutions.index');
Route::trans('/__(routes.solutions)/{slug}', SolutionsController::class.'@show')->translator('getSolutionSlug')->name('solutions.show');

Route::trans('/__(routes.job-offers)/{slug}', JobOffersController::class.'@show')->translator('getJobOfferSlug')->name('job-offer.show');

Route::trans('/__(routes.landing-pages)/{slug}', LandingPageController::class.'@show')->translator('getLandingPageSlug')->name('landing-pages.show');

Route::trans('/__(routes.application)', ApplicationController::class.'@index')->name('application');

Route::trans('/__(routes.imprint)', ImprintController::class)->name('imprint');
Route::trans('/__(routes.datapolicy)', DatapolicyController::class)->name('datapolicy');

Route::trans('/__(routes.directions)', DirectionsController::class)->name('directions');

// Redirect to locale
Route::get('/', function () {
    $locale = app()->getLocale();
    $acceptedLanguages = request()->server('HTTP_ACCEPT_LANGUAGE');

    if (! empty($acceptedLanguages)) {
        $locale = substr($acceptedLanguages, 0, 2);
    }

    return redirect($locale);
});

Route::get('/references/pdf', [ReferencesPdfController::class, 'createPdf']);
Route::get('/references/testpdf', [ReferencesPdfController::class, 'showView']);

Route::get('/reference-pdf/{slug}', [ReferencesPdfController::class, 'createSingleReferencePdf']);
