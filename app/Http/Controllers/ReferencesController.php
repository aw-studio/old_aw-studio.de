<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Fjord\Support\Facades\Form;
use App\Models\Reference;

class ReferencesController extends Controller
{
    public function index()
    {
        return view('pages.references.index')->with([
        'references' => Form::load('pages', 'references'),
        'highlights' => Form::load('collections', 'highlights'),
        'featured' => Form::load('collections', 'featured'),
        'references_az' => Reference::get()->sortBy('title')
      ]);
    }

    public function show($slug)
    {
        $reference = Reference::whereHas('translations', function ($query) use ($slug) {
            $query->where('slug', $slug)->where('locale', app()->getLocale());
        })->with('translations')->first();

        if (! $reference || ! $reference->active) {
            abort(404);
        }

        $slugs = $reference->translations->mapWithKeys(function ($item) {
            return [$item->locale => $item->slug];
        })->toArray();



        return view('pages.references.show')->with([
        'reference' => $reference,
        'next_reference_slug' => $this->getNextReferenceSlug($slug),
        'routeParameters' => ['slug' => $slugs]
      ]);
    }


    private function getNextReferenceSlug($current)
    {
        $this->current = $current;
        $highlights_references = Form::load('collections', 'highlights');
        $featured_references = Form::load('collections', 'featured');

        $highlights_and_featured = $highlights_references[0]->merge($featured_references[0]);

        $current_index = $highlights_and_featured->search(function ($reference) {
            return $reference->slug === $this->current;
        });

        if ($current_index < $highlights_and_featured->count()-1) {
            $next_index = $current_index + 1;
        } else {
            $next_index = 0;
        }

        $next_slug = $highlights_and_featured[$next_index]->slug;
        return $next_slug;
    }
}
