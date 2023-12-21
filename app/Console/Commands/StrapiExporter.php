<?php

namespace App\Console\Commands;

use App\Console\Commands\Support\StrapiEntry;
use App\Models\Customer;
use App\Models\Post;
use App\Models\Reference;
use App\Models\Service;
use Illuminate\Console\Command;

class StrapiExporter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:strapi {model} {--remote}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->option('remote')) {
            config([
                'strapi.token' => env('STRAPI_STAGING_TOKEN'),
                'strapi.url' => env('STRAPI_STAGING_URL'),
            ]);
        } else {
            config([
                'strapi.token' => '42338e68cb4f60c659072522d19174b657e489ff36c21d0e19c31b97b4b0ee7176697adc672f17eac251c9f31fb07bd4b968df571f92c2e5b35c33fec5fb9afd7aa1efda7299aa281351f8874a30e60d1aabbb0435e1095fbe4dfbce1b23a6cfb08caaea66a6bf1cb01ae6adc72ed94ca9807cedeb4b04bebee5c3eecb56c5e5',
                'strapi.url' => 'http://localhost:1337/api/',
            ]);
        }

        $model = $this->argument('model');

        $options = [
            'references',
            'posts',
            'customers',
            'services',
        ];

        if (! in_array($model, $options)) {
            $this->error('Export not found. Please  use one of these options: '.implode(', ', $options));

            return 1;
        }

        $this->info("Exporting $model");
        $this->export($model);
        $this->info('Done');

        return 0;
    }

    public function export($model)
    {
        return match ($model) {
            'references' => $this->exportReferences(),
            'posts' => $this->exportPosts(),
            'customers' => $this->exportCustomers(),
            'services' => $this->exportServices(),
            default => null,
        };
    }

    public function exportServices()
    {
        $mappings = [
            'title' => 'Title',
            'svg' => 'Icon',
            'excerpt' => 'Excerpt',
            'text' => 'Text',
            'list_title' => 'ListTitle',
            'list' => 'List',
        ];

        Service::limit(100)
            ->cursor()
            ->each(function ($service) use ($mappings) {
                $entity = new StrapiEntry('services');

                $entity->withTranslation(
                    'en',
                    $this->mapToNewKeys(
                        $service->translate('en')->toArray(),
                        $mappings
                    )
                );

                $response = $entity->create(
                    $this->mapToNewKeys(
                        $service->toArray(),
                        $mappings
                    ),
                );

                $this->info("Exporting {$service->title}: {$response->status()}");
            });

    }

    public function exportReferences()
    {
        $mappings = [
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'url' => 'Url',
            'link_text' => 'LinkText',
            'excerpt' => 'Excerpt',
            'text' => 'IntroText',
            'buzzwords' => 'Features',
            'slug' => 'Slug',
        ];

        Reference::limit(100)
            ->cursor()
            ->each(function ($ref) use ($mappings) {
                $entity = new StrapiEntry('references');

                if ($ref->image) {
                    $entity->withImage('Image', $ref->image->getPath());
                }

                $entity->withTranslation(
                    'en',
                    $this->mapToNewKeys(
                        $ref->translate('en')->toArray(),
                        $mappings
                    )
                );

                $response = $entity->create(
                    $this->mapToNewKeys(
                        $ref->toArray(),
                        $mappings
                    ),
                );

                $this->info("Exporting {$ref->title}: {$response->status()}");
            });
    }

    public function exportPosts()
    {
        $mappings = [
            'title' => 'Title',
            'slug' => 'Slug',
            'excerpt' => 'Excerpt',
            'h1' => 'H1',
            'text' => 'Text',
        ];

        Post::limit(100)
            ->cursor()
            ->each(function ($post) use ($mappings) {
                $entity = new StrapiEntry('articles');

                if ($post->image) {
                    $entity->withImage('Image', $post->image->getPath());
                }

                $entity->withTranslation(
                    'en',
                    $this->mapToNewKeys(
                        $post->translate('en')->toArray(),
                        $mappings
                    )
                );

                $response = $entity->create(
                    array_merge(
                        $this->mapToNewKeys(
                            $post->toArray(),
                            $mappings
                        ),
                        [
                            'ReleaseDate' => $post->published_at ?? $post->updated_at,
                        ]
                    ),
                );

                $this->info("Exporting {$post->title}: {$response->status()}");
            });

    }

    public function exportCustomers()
    {
        $mappings = [
            'name' => 'Name',
            'logo_scale' => 'Scale',
            'suffix' => 'Addition',
            'description' => 'Description',
            'url' => 'Url',
        ];

        Customer::limit(100)
            ->where('active', true)
            ->cursor()
            ->each(function ($customer) use ($mappings) {
                $entity = new StrapiEntry('customers');

                if ($customer->image) {
                    $entity->withImage('Logo', $customer->image->getPath());
                }

                $entity->withTranslation(
                    'en',
                    $this->mapToNewKeys(
                        $customer->translate('en')->toArray(),
                        $mappings
                    )
                );

                $attributes = $this->mapToNewKeys(
                    $customer->toArray(),
                    $mappings
                );

                $response = $entity->create(
                    $attributes
                );

                $this->info("Exporting {$customer->name}: {$response->status()}");
            });

    }

    public function mapToNewKeys($originalArray, $keyMapping)
    {
        $mappedArray = [];

        foreach ($originalArray as $key => $value) {
            if (isset($keyMapping[$key])) {
                $mappedArray[$keyMapping[$key]] = $value;
            }
        }

        return $mappedArray;
    }
}
