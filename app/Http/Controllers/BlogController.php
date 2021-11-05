<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use Lit\Config\Form\Pages\BlogConfig;

class BlogController extends Controller
{
    public function index()
    {
        return view('pages.blog.index')->with([
            'blog'  => BlogConfig::load(),
            'posts' => Post::whereActive(1)->orderBy('updated_at')->get(),
            'tags'  => Tag::all(),
        ]);
    }

    public function show($slug)
    {
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

    /**
     * Returns either all posts if nothing is selected or the posts with the selected filter options.
     *
     * @return mixed
     */
    public function filter(Request $request)
    {
        $tag_ids = $request->tag_ids;
        $query = Post::whereActive(1)->orderBy('updated_at')->with('tags');

        if (collect($tag_ids)->isNotEmpty()) {
            $posts = $query->whereHas('tags', function ($query) use ($tag_ids) {
                $query->whereIn('tag_id', $tag_ids);
            })->get();
        } else {
            $posts = $query->get();
        }

        return $posts;
    }
}
