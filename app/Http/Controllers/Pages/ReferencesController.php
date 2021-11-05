<?php

namespace App\Http\Controllers\Pages;

use App\Models\Reference;
use App\Http\Controllers\Controller;
use Lit\Config\Form\Pages\ReferencesConfig;
use Lit\Config\Form\Collections\FeaturedConfig;
use Lit\Config\Form\Collections\HighlightsConfig;

class ReferencesController extends Controller
{
    public function index()
    {
        return view('pages.references.index')->with([
            'references'    => ReferencesConfig::load(),
            'highlights'    => HighlightsConfig::load(),
            'featured'      => FeaturedConfig::load(),
            'references_az' => Reference::get()->sortBy('title'),
        ]);
    }

    public function show($slug)
    {
        $reference = Reference::whereHas('translations', function ($query) use ($slug) {
            $query->where('slug', $slug)->where('locale', app()->getLocale());
        })->with('translations')->first();

        if (! $reference || ! $reference->active) {
            return redirect()->route(app()->getLocale().'.references.index');
        }

        $slugs = $reference->translations->mapWithKeys(function ($item) {
            return [$item->locale => $item->slug];
        })->toArray();

        return view('pages.references.show')->with([
            'reference'           => $reference,
            'next_reference_slug' => $this->getNextReferenceSlug($slug),
            'routeParameters'     => ['slug' => $slugs],
        ]);
    }

    private function getNextReferenceSlug($current)
    {
        $this->current = $current;
        $highlights_references = HighlightsConfig::load();
        $featured_references = FeaturedConfig::load();
        $highlights_and_featured = $highlights_references->references->merge($featured_references->references);

        $current_index = $highlights_and_featured->search(function ($reference) {
            return $reference->slug === $this->current;
        });

        if ($current_index < $highlights_and_featured->count() - 1) {
            $next_index = $current_index + 1;
        } else {
            $next_index = 0;
        }

        $next_slug = $highlights_and_featured[$next_index]->slug;

        return $next_slug;
    }

    /**
     * Looks up the translated slug for a crud in the translation table.
     *
     * @return slug
     */
    public function getReferenceSlug($locale, $slug)
    {
        $slug = Reference::whereTranslation('slug', $slug)
            ->first()
            ->translate($locale)
            ->slug;

        return ['slug' => $slug];
    }
}
