<?php

namespace Lit\Actions;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class GenerateXmlSitemapAction
{
    /**
     * Run the action.
     *
     * @param  Collection  $models
     * @return JsonResponse
     */
    public function run(Collection $models)
    {
        //

        SitemapGenerator::create(env('APP_URL'))
        ->getSitemap()
        ->add(Post::all())
        ->writeToFile('sitemap.xml');
    }
}
