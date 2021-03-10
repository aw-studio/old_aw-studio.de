<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        return view('pages.blog.index')->with([
            'blog' => Form::load('pages', 'blog'),
        ]);
    }

    public function show($slug)
    {
        $post = Post::whereHas('translations', function ($query) use ($slug) {
            $query->where('slug', $slug)->where('locale', app()->getLocale());
        })->with('translations')->first();

        return view('pages.blog.show')->with([
            'post' => $post,
        ]);
    }
}
