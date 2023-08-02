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

Route::get('/de/jobs/assistenz-der-geschaeftsfuehrung-projekt-assistenz-50-m-w-d', function () {
    return redirect('/jobs/assistenz-der-geschaeftsfuehrung-projekt-assistenz-50-m-w-d', 301);
});
Route::get('/de/leistungen', function () {
    return redirect('/leistungen', 301);
});
Route::get('/de/studio', function () {
    return redirect('/studio', 301);
});
Route::get('/de/blog', function () {
    return redirect('/blog', 301);
});
Route::get('/de/referenzen', function () {
    return redirect('/referenzen', 301);
});
Route::get('/de/leistungen/analyse', function () {
    return redirect('/leistungen/analyse', 301);
});
Route::get('/de/leistungen/beratung', function () {
    return redirect('/leistungen/beratung', 301);
});
Route::get('/de/leistungen/konzeption', function () {
    return redirect('/leistungen/konzeption', 301);
});
Route::get('/de/leistungen/web-design', function () {
    return redirect('/leistungen/web-design', 301);
});
Route::get('/de/leistungen/ui-ux-design', function () {
    return redirect('/leistungen/ui-ux-design', 301);
});
Route::get('/de/leistungen/kommunikationsdesign', function () {
    return redirect('/leistungen/kommunikationsdesign', 301);
});
Route::get('/de/leistungen/app-entwicklung', function () {
    return redirect('/leistungen/app-entwicklung', 301);
});
Route::get('/de/leistungen/software-entwicklung', function () {
    return redirect('/leistungen/software-entwicklung', 301);
});
Route::get('/de/leistungen/projektmanagement', function () {
    return redirect('/leistungen/projektmanagement', 301);
});
Route::get('/de/leistungen/web-entwicklung', function () {
    return redirect('/leistungen/web-entwicklung', 301);
});
Route::get('/de/leistungen/web-hosting-wartung', function () {
    return redirect('/leistungen/web-hosting-wartung', 301);
});
Route::get('/de/blog/mvp', function () {
    return redirect('/blog/mvp', 301);
});
Route::get('/de/jobs/assistenz-der-geschaeftsfuehrung-projekt-assistenz-50-m-w-d', function () {
    return redirect('/jobs/assistenz-der-geschaeftsfuehrung-projekt-assistenz-50-m-w-d', 301);
});
Route::get('/de/referenzen/netz-der-verfolgung', function () {
    return redirect('/referenzen/netz-der-verfolgung', 301);
});
Route::get('/de/blog/prototyping', function () {
    return redirect('/blog/prototyping', 301);
});
Route::get('/de/anfahrt', function () {
    return redirect('/anfahrt', 301);
});
Route::get('/de/referenzen/kueberit-produktplattform-pim', function () {
    return redirect('/referenzen/kueberit-produktplattform-pim', 301);
});
Route::get('/de/referenzen/g-rack-bar-konfigurator', function () {
    return redirect('/referenzen/g-rack-bar-konfigurator', 301);
});
Route::get('/de/referenzen/digitale-woche-kiel', function () {
    return redirect('/referenzen/digitale-woche-kiel', 301);
});
Route::get('/de/datenschutz', function () {
    return redirect('/datenschutz', 301);
});
Route::get('/de/bewerbung', function () {
    return redirect('/bewerbung', 301);
});
Route::get('/de/impressum', function () {
    return redirect('/impressum', 301);
});
Route::get('/de/blog/strapi-cms', function () {
    return redirect('/blog/strapi-cms', 301);
});
Route::get('/de/blog/design-systeme', function () {
    return redirect('/blog/design-systeme', 301);
});
Route::get('/de/referenzen/checkin-webapp-corona-teststation', function () {
    return redirect('/referenzen/checkin-webapp-corona-teststation', 301);
});
Route::get('/de/referenzen/kueberit-web-2022', function () {
    return redirect('/referenzen/kueberit-web-2022', 301);
});
Route::get('/de/referenzen/wlv-landwirtschaftsverband', function () {
    return redirect('/referenzen/wlv-landwirtschaftsverband', 301);
});
Route::get('/de/referenzen/parkservice-kiel-nord', function () {
    return redirect('/referenzen/parkservice-kiel-nord', 301);
});
Route::get('/de/referenzen/coworkland-plattform', function () {
    return redirect('/referenzen/coworkland-plattform', 301);
});
Route::get('/de/referenzen/aidshilfe-sh', function () {
    return redirect('/referenzen/aidshilfe-sh', 301);
});
Route::get('/de/referenzen/hmc-website', function () {
    return redirect('/referenzen/hmc-website', 301);
});
Route::get('/de/referenzen/bassliner-check-in-app', function () {
    return redirect('/referenzen/bassliner-check-in-app', 301);
});
Route::get('/de/referenzen/bassliner', function () {
    return redirect('/referenzen/bassliner', 301);
});
Route::get('/de/referenzen/ceramic-success-analysis', function () {
    return redirect('/referenzen/ceramic-success-analysis', 301);
});
Route::get('/de/referenzen/coworkland', function () {
    return redirect('/referenzen/coworkland', 301);
});
Route::get('/de/referenzen/muhlack-kiel', function () {
    return redirect('/referenzen/muhlack-kiel', 301);
});
Route::get('/de/referenzen/akustikbild-de', function () {
    return redirect('/referenzen/akustikbild-de', 301);
});
Route::get('/de/referenzen/serviceagentur-ganztaegig-lernen-schleswig-holstein', function () {
    return redirect('/referenzen/serviceagentur-ganztaegig-lernen-schleswig-holstein', 301);
});
Route::get('/de/referenzen/center-for-ocean-and-society', function () {
    return redirect('/referenzen/center-for-ocean-and-society', 301);
});
Route::get('/de/referenzen/parken-zum-hafen', function () {
    return redirect('/referenzen/parken-zum-hafen', 301);
});
Route::get('/de/referenzen-a-z', function () {
    return redirect('/referenzen-a-z', 301);
});
Route::get('/de/referenzen/schnittger-architekten', function () {
    return redirect('/referenzen/schnittger-architekten', 301);
});
Route::get('/de/referenzen/kabuja-movie-production', function () {
    return redirect('/referenzen/kabuja-movie-production', 301);
});
Route::get('/de/referenzen/future-ocean-research', function () {
    return redirect('/referenzen/future-ocean-research', 301);
});
Route::get('/de/referenzen/sommer-in-friedrichsort', function () {
    return redirect('/referenzen/sommer-in-friedrichsort', 301);
});

Route::get('/de/referenzen/laravel-content-administration', function () {
    return redirect('/referenzen/laravel-content-administration', 301);
});

Route::get('/de/referenzen/elektro-voesch', function () {
    return redirect('/referenzen/elektro-voesch', 301);
});
Route::get('/de/referenzen/luest-festival', function () {
    return redirect('/referenzen/luest-festival', 301);
});
Route::get('/de/referenzen/habitat-festival', function () {
    return redirect('/referenzen/habitat-festival', 301);
});
Route::get('/de/referenzen/blaue-biooekonomie', function () {
    return redirect('/referenzen/blaue-biooekonomie', 301);
});
Route::get('/de/referenzen/caphenia', function () {
    return redirect('/referenzen/caphenia', 301);
});
Route::get('/de/referenzen/die-holzpiraten', function () {
    return redirect('/referenzen/die-holzpiraten', 301);
});
Route::get('/de/referenzen/evolung', function () {
    return redirect('/referenzen/evolung', 301);
});
Route::get('/de/referenzen/fischdetektive', function () {
    return redirect('/referenzen/fischdetektive', 301);
});
Route::get('/de/referenzen/future-ocean-dialogue', function () {
    return redirect('/referenzen/future-ocean-dialogue', 301);
});
Route::get('/de/referenzen/future-ocean', function () {
    return redirect('/referenzen/future-ocean', 301);
});
Route::get('/de/referenzen/graadwies', function () {
    return redirect('/referenzen/graadwies', 301);
});
Route::get('/de/referenzen/immobilien-lorenzen', function () {
    return redirect('/referenzen/immobilien-lorenzen', 301);
});
Route::get('/de/referenzen/kiel-works', function () {
    return redirect('/referenzen/kiel-works', 301);
});
Route::get('/de/referenzen/kueberit', function () {
    return redirect('/referenzen/kueberit', 301);
});
Route::get('/de/referenzen/physio-tech', function () {
    return redirect('/referenzen/physio-tech', 301);
});
Route::get('/de/referenzen/planet-power', function () {
    return redirect('/referenzen/planet-power', 301);
});
Route::get('/de/referenzen/querbeet', function () {
    return redirect('/referenzen/querbeet', 301);
});
Route::get('/de/referenzen/technik-gegen-terror', function () {
    return redirect('/referenzen/technik-gegen-terror', 301);
});
Route::get('/de/referenzen/together-at-home', function () {
    return redirect('/referenzen/together-at-home', 301);
});
Route::get('/de/referenzen/u-heart', function () {
    return redirect('/referenzen/u-heart', 301);
});
Route::get('/de/referenzen/transevo', function () {
    return redirect('/referenzen/transevo', 301);
});
Route::get('/de/referenzen/zahnarzt-dr-tuexen', function () {
    return redirect('/referenzen/zahnarzt-dr-tuexen', 301);
});
Route::get('/de/referenzen/zww-kiel', function () {
    return redirect('/referenzen/zww-kiel', 301);
});
Route::get('/de/blog/vue-js', function () {
    return redirect('/blog/vue-js', 301);
});
Route::get('/de/blog/nuxt-js', function () {
    return redirect('/blog/nuxt-js', 301);
});
Route::get('/de/blog/laravel', function () {
    return redirect('/blog/laravel', 301);
});
