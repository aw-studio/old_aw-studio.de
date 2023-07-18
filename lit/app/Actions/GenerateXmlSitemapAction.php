<?php

namespace Lit\Actions;

use Spatie\Sitemap\Tags\Url;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Spatie\Sitemap\SitemapGenerator;

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
        // ->hasCrawled(function (Url $url) {
        //     if ($url->url === 'http://g-rack.de.test/') {
        //         return;
        //     }
        //     if ($url->url === 'https://grk.aw-studio.de/') {
        //         return;
        //     }
        //     if ($url->url === 'https://g-rack.de/') {
        //         return;
        //     }

        //     return $url;
        // })
        ->writeToFile('sitemap.xml');
    }
}
