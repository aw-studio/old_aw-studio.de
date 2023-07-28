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
// Route::get('/', function () {
//     $locale = app()->getLocale();
//     $acceptedLanguages = request()->server('HTTP_ACCEPT_LANGUAGE');

//     if (! empty($acceptedLanguages)) {
//         $locale = substr($acceptedLanguages, 0, 2);
//     }

//     return redirect($locale);
// });

Route::get('/references/pdf', [ReferencesPdfController::class, 'createPdf']);
Route::get('/references/testpdf', [ReferencesPdfController::class, 'showView']);

Route::get('/reference-pdf/{slug}', [ReferencesPdfController::class, 'createSingleReferencePdf']);

Route::get('/de', function () {
    return redirect('/', 301);
});

Route::get('https://aw-studio.de/de/jobs/assistenz-der-geschaeftsfuehrung-projekt-assistenz-50-m-w-d', function () {
    return redirect ('https://aw-studio.de/jobs/assistenz-der-geschaeftsfuehrung-projekt-assistenz-50-m-w-d', 301);
    });
    Route::get('https://aw-studio.de/de/leistungen', function () {
    return redirect ('https://aw-studio.de/leistungen', 301);
    });
    Route::get('https://aw-studio.de/de/studio', function () {
    return redirect ('https://aw-studio.de/studio', 301);
    });
    Route::get('https://aw-studio.de/de/blog', function () {
    return redirect ('https://aw-studio.de/blog', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen', function () {
    return redirect ('https://aw-studio.de/referenzen', 301);
    });
    Route::get('https://aw-studio.de/de/leistungen/analyse', function () {
    return redirect ('https://aw-studio.de/leistungen/analyse', 301);
    });
    Route::get('https://aw-studio.de/de/leistungen/beratung', function () {
    return redirect ('https://aw-studio.de/leistungen/beratung', 301);
    });
    Route::get('https://aw-studio.de/de/leistungen/konzeption', function () {
    return redirect ('https://aw-studio.de/leistungen/konzeption', 301);
    });
    Route::get('https://aw-studio.de/de/leistungen/web-design', function () {
    return redirect ('https://aw-studio.de/leistungen/web-design', 301);
    });
    Route::get('https://aw-studio.de/de/leistungen/ui-ux-design', function () {
    return redirect ('https://aw-studio.de/leistungen/ui-ux-design', 301);
    });
    Route::get('https://aw-studio.de/de/leistungen/kommunikationsdesign', function () {
    return redirect ('https://aw-studio.de/leistungen/kommunikationsdesign', 301);
    });
    Route::get('https://aw-studio.de/de/leistungen/app-entwicklung', function () {
    return redirect ('https://aw-studio.de/leistungen/app-entwicklung', 301);
    });
    Route::get('https://aw-studio.de/de/leistungen/software-entwicklung', function () {
    return redirect ('https://aw-studio.de/leistungen/software-entwicklung', 301);
    });
    Route::get('https://aw-studio.de/de/leistungen/projektmanagement', function () {
    return redirect ('https://aw-studio.de/leistungen/projektmanagement', 301);
    });
    Route::get('https://aw-studio.de/de/leistungen/web-entwicklung', function () {
    return redirect ('https://aw-studio.de/leistungen/web-entwicklung', 301);
    });
    Route::get('https://aw-studio.de/de/leistungen/web-hosting-wartung', function () {
    return redirect ('https://aw-studio.de/leistungen/web-hosting-wartung', 301);
    });
    Route::get('https://aw-studio.de/de/blog/mvp', function () {
    return redirect ('https://aw-studio.de/blog/mvp', 301);
    });
    Route::get('https://aw-studio.de/de/jobs/assistenz-der-geschaeftsfuehrung-projekt-assistenz-50-m-w-d', function () {
    return redirect ('https://aw-studio.de/jobs/assistenz-der-geschaeftsfuehrung-projekt-assistenz-50-m-w-d', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/netz-der-verfolgung', function () {
    return redirect ('https://aw-studio.de/referenzen/netz-der-verfolgung', 301);
    });
    Route::get('https://aw-studio.de/de/blog/prototyping', function () {
    return redirect ('https://aw-studio.de/blog/prototyping', 301);
    });
    Route::get('https://aw-studio.de/de/anfahrt', function () {
    return redirect ('https://aw-studio.de/anfahrt', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/kueberit-produktplattform-pim', function () {
    return redirect ('https://aw-studio.de/referenzen/kueberit-produktplattform-pim', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/g-rack-bar-konfigurator', function () {
    return redirect ('https://aw-studio.de/referenzen/g-rack-bar-konfigurator', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/digitale-woche-kiel', function () {
    return redirect ('https://aw-studio.de/referenzen/digitale-woche-kiel', 301);
    });
    Route::get('https://aw-studio.de/de/datenschutz', function () {
    return redirect ('https://aw-studio.de/datenschutz', 301);
    });
    Route::get('https://aw-studio.de/de/bewerbung', function () {
    return redirect ('https://aw-studio.de/bewerbung', 301);
    });
    Route::get('https://aw-studio.de/de/impressum', function () {
    return redirect ('https://aw-studio.de/impressum', 301);
    });
    Route::get('https://aw-studio.de/de/blog/strapi-cms', function () {
    return redirect ('https://aw-studio.de/blog/strapi-cms', 301);
    });
    Route::get('https://aw-studio.de/de/blog/design-systeme', function () {
    return redirect ('https://aw-studio.de/blog/design-systeme', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/checkin-webapp-corona-teststation', function () {
    return redirect ('https://aw-studio.de/referenzen/checkin-webapp-corona-teststation', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/kueberit-web-2022', function () {
    return redirect ('https://aw-studio.de/referenzen/kueberit-web-2022', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/wlv-landwirtschaftsverband', function () {
    return redirect ('https://aw-studio.de/referenzen/wlv-landwirtschaftsverband', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/parkservice-kiel-nord', function () {
    return redirect ('https://aw-studio.de/referenzen/parkservice-kiel-nord', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/coworkland-plattform', function () {
    return redirect ('https://aw-studio.de/referenzen/coworkland-plattform', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/aidshilfe-sh', function () {
    return redirect ('https://aw-studio.de/referenzen/aidshilfe-sh', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/hmc-website', function () {
    return redirect ('https://aw-studio.de/referenzen/hmc-website', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/bassliner-check-in-app', function () {
    return redirect ('https://aw-studio.de/referenzen/bassliner-check-in-app', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/bassliner', function () {
    return redirect ('https://aw-studio.de/referenzen/bassliner', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/ceramic-success-analysis', function () {
    return redirect ('https://aw-studio.de/referenzen/ceramic-success-analysis', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/coworkland', function () {
    return redirect ('https://aw-studio.de/referenzen/coworkland', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/muhlack-kiel', function () {
    return redirect ('https://aw-studio.de/referenzen/muhlack-kiel', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/akustikbild-de', function () {
    return redirect ('https://aw-studio.de/referenzen/akustikbild-de', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/serviceagentur-ganztaegig-lernen-schleswig-holstein', function () {
    return redirect ('https://aw-studio.de/referenzen/serviceagentur-ganztaegig-lernen-schleswig-holstein', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/center-for-ocean-and-society', function () {
    return redirect ('https://aw-studio.de/referenzen/center-for-ocean-and-society', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/parken-zum-hafen', function () {
    return redirect ('https://aw-studio.de/referenzen/parken-zum-hafen', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen-a-z', function () {
    return redirect ('https://aw-studio.de/referenzen-a-z', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/schnittger-architekten', function () {
    return redirect ('https://aw-studio.de/referenzen/schnittger-architekten', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/kabuja-movie-production', function () {
    return redirect ('https://aw-studio.de/referenzen/kabuja-movie-production', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/future-ocean-research', function () {
    return redirect ('https://aw-studio.de/referenzen/future-ocean-research', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/sommer-in-friedrichsort', function () {
    return redirect ('https://aw-studio.de/referenzen/sommer-in-friedrichsort', 301);
    });
    
    Route::get('https://aw-studio.de/de/referenzen/laravel-content-administration', function () {
    return redirect ('https://aw-studio.de/referenzen/laravel-content-administration', 301);
    });
    
    Route::get('https://aw-studio.de/de/referenzen/elektro-voesch', function () {
    return redirect ('https://aw-studio.de/referenzen/elektro-voesch', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/luest-festival', function () {
    return redirect ('https://aw-studio.de/referenzen/luest-festival', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/habitat-festival', function () {
    return redirect ('https://aw-studio.de/referenzen/habitat-festival', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/blaue-biooekonomie', function () {
    return redirect ('https://aw-studio.de/referenzen/blaue-biooekonomie', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/caphenia', function () {
    return redirect ('https://aw-studio.de/referenzen/caphenia', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/die-holzpiraten', function () {
    return redirect ('https://aw-studio.de/referenzen/die-holzpiraten', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/evolung', function () {
    return redirect ('https://aw-studio.de/referenzen/evolung', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/fischdetektive', function () {
    return redirect ('https://aw-studio.de/referenzen/fischdetektive', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/future-ocean-dialogue', function () {
    return redirect ('https://aw-studio.de/referenzen/future-ocean-dialogue', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/future-ocean', function () {
    return redirect ('https://aw-studio.de/referenzen/future-ocean', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/graadwies', function () {
    return redirect ('https://aw-studio.de/referenzen/graadwies', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/immobilien-lorenzen', function () {
    return redirect ('https://aw-studio.de/referenzen/immobilien-lorenzen', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/kiel-works', function () {
    return redirect ('https://aw-studio.de/referenzen/kiel-works', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/kueberit', function () {
    return redirect ('https://aw-studio.de/referenzen/kueberit', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/physio-tech', function () {
    return redirect ('https://aw-studio.de/referenzen/physio-tech', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/planet-power', function () {
    return redirect ('https://aw-studio.de/referenzen/planet-power', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/querbeet', function () {
    return redirect ('https://aw-studio.de/referenzen/querbeet', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/technik-gegen-terror', function () {
    return redirect ('https://aw-studio.de/referenzen/technik-gegen-terror', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/together-at-home', function () {
    return redirect ('https://aw-studio.de/referenzen/together-at-home', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/u-heart', function () {
    return redirect ('https://aw-studio.de/referenzen/u-heart', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/transevo', function () {
    return redirect ('https://aw-studio.de/referenzen/transevo', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/zahnarzt-dr-tuexen', function () {
    return redirect ('https://aw-studio.de/referenzen/zahnarzt-dr-tuexen', 301);
    });
    Route::get('https://aw-studio.de/de/referenzen/zww-kiel', function () {
    return redirect ('https://aw-studio.de/referenzen/zww-kiel', 301);
    });
    Route::get('https://aw-studio.de/de/blog/vue-js', function () {
    return redirect ('https://aw-studio.de/blog/vue-js', 301);
    });
    Route::get('https://aw-studio.de/de/blog/laravel', function () {
    return redirect ('https://aw-studio.de/blog/laravel', 301);
    });
