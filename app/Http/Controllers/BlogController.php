<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Ignite\Support\Facades\Form;

class BlogController extends Controller
{
    public function index()
    {
        return view('pages.blog.index')->with([
            'blog'  => Form::load('pages', 'blog'),
            'posts' => Post::whereActive(1)->orderBy('updated_at')->get(),
        ]);
    }

    public function show($slug)
    {
        // $post = Post::whereTranslation('slug', $slug)->first();
        $post = Post::whereHas('translations', function ($query) use ($slug) {
            $query->where('slug', $slug)->where('locale', app()->getLocale());
        })->with('translations')->first();

        $slugs = $post->translations->mapWithKeys(function ($item) {
            return [$item->locale => $item->slug];
        })->toArray();

        return view('pages.blog.show')->with([
            'post' => $post,
        ]);
    }

    /**
     * Looks up the translated slug for a crud in the translation table.
     *
     * @return slug
     */
    public function getPostSlug($locale, $slug)
    {
        $slug = Post::whereTranslation('slug', $slug)
            ->first()
            ->translate($locale)
            ->slug;

        return ['slug' => $slug];
    }
}
