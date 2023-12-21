<?php

namespace App\Console\Commands\Support;

use Illuminate\Support\Facades\Http;

class StrapiEntry
{
    public $images = [];

    public $translations = [];

    public $endpoint;

    public function __construct($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    /**
     * @param  string  $attributeKey Name of the image attribute in Strapi
     * @param  string  $path Absolute path to the image file
     */
    public function withImage(string $attributeKey, string $path)
    {
        $this->images = [
            ...$this->images,
            [
                'key' => $attributeKey,
                'path' => $path,
            ],
        ];
    }

    public function withTranslation(string $locale, array $attributes)
    {
        $this->translations[$locale] = $attributes;
    }

    public function create($attributes = [])
    {
        $client = Http::withToken(
            config('strapi.token'),
            'Bearer '
        )->withOptions([
            'base_uri' => config('strapi.url'),
        ]);

        $client = $this->addImages($client);

        /**
         * If there are images, we send multipart/form-data so we need to
         * encode the attributes as JSON. Otherwise, we send a JSON body.
         */
        $attributes = $this->images == [] ? $attributes : json_encode($attributes);

        $response = $client->post($this->endpoint, [
            'data' => $attributes,
        ]);

        if (! $response->successful()) {
            logger($response->json('error.message'));

            return $response;
        }

        $id = $response->json('data.id');

        $this->createTranslations($response);

        return $response;

        // return $client->get("{$this->endpoint}/{$id}?populate=localizations");
    }

    public function createTranslations($response)
    {
        if ($this->translations == []) {
            return;
        }

        $id = $response->json('data.id');

        foreach ($this->translations as $locale => $attriubutes) {
            $client = Http::withToken(
                config('strapi.token'),
                'Bearer '
            )->withOptions([
                'base_uri' => config('strapi.url'),
            ]);

            $payload = [
                'locale' => $locale,
                ...$attriubutes,
            ];
            $response = $client->post(
                $this->endpoint.'/'.$id.'/localizations',
                $payload
            );
            if (! $response->successful()) {
                logger($response->json('error.message'));
            }
        }
    }

    protected function addImages($client)
    {
        if ($this->images == []) {
            return $client;
        }

        foreach ($this->images as $image) {
            $client->attach(
                'files.'.$image['key'],
                fopen($image['path'], 'r')
            );
        }

        return $client;
    }
}
