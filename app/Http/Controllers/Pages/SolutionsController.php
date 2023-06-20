<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use Lit\Config\Form\Pages\SolutionsConfig;

class SolutionsController extends Controller
{
    public function index()
    {
        return view('pages.solutions.index')->with([
            'page' => SolutionsConfig::load(),
            'solutions'    => Solution::active()->get(),
        ]);
    }

    public function show($slug)
    {
        $solution = Solution::whereHas('translations', function ($query) use ($slug) {
            $query->where('slug', $slug)->where('locale', app()->getLocale());
        })->active()->with('translations')->first();

        if (! $solution || ! $solution->active) {
            return redirect()->route(app()->getLocale().'.customers.index');
        }

        $slugs = $solution->translations->mapWithKeys(function ($item) {
            return [$item->locale => $item->slug];
        })->toArray();

        return view('pages.solutions.show')->with([
            'solution'           => $solution,
            'routeParameters'     => ['slug' => $slugs],
        ]);
    }

    /**
     * Looks up the translated slug for a crud in the translation table.
     *
     * @return slug
     */
    public function getSolutionSlug($locale, $slug)
    {
        $slug = Solution::whereTranslation('slug', $slug)
            ->first()
            ->translate($locale)
            ->slug;

        return ['slug' => $slug];
    }
}
