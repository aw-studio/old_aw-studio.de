<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;

class JobOffersController extends Controller
{
    public function show($slug)
    {
        $job_offer = JobOffer::whereHas('translations', function ($query) use ($slug) {
            $query->where('slug', $slug)->where('locale', app()->getLocale());
        })->with('translations')->first();

        if (! $job_offer || ! $job_offer->active) {
            return redirect()->route(app()->getLocale().'.home');
        }

        return view('pages.job-offers.show')->with([
            'job_offer' => $job_offer,
        ]);
    }

    /**
     * Looks up the translated slug for a crud in the translation table.
     *
     * @return slug
     */
    public function getJobOfferSlug($locale, $slug)
    {
        $slug = JobOffer::whereTranslation('slug', $slug)
            ->first()
            ->translate($locale)
            ->slug;

        return ['slug' => $slug];
    }
}
