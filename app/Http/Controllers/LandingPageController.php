<?php

namespace App\Http\Controllers;

use App\Models\LandingPage;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function show($slug)
    {
        $landingPage = LandingPage::whereHas('translations', function ($query) use ($slug) {
            $query->where('slug', $slug)->where('locale', app()->getLocale());
        })->with('translations')->first();

        $slugs = $landingPage->translations->mapWithKeys(function ($item) {
            return [$item->locale => $item->slug];
        })->toArray();

        return view('pages.landing-pages.show')->with([
            'landingPage' => $landingPage,
        ]);
    }

    /**
     * Looks up the translated slug for a crud in the translation table.
     *
     * @return slug
     */
    public function getLandingPageSlug($locale, $slug)
    {
        $slug = LandingPage::whereTranslation('slug', $slug)
            ->first()
            ->translate($locale)
            ->slug;

        return ['slug' => $slug];
    }
}
