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
        $post = Post::whereHas('translations', function ($query) use ($slug) {
            $query->where('slug', $slug)->where('locale', app()->getLocale());
        })->with('translations')->first();

        $slugs = $reference->translations->mapWithKeys(function ($item) {
            return [$item->locale => $item->slug];
        })->toArray();

        return view('pages.blog.show')->with([
            'post' => $post,
        ]);
    }
}
