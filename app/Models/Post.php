<?php

namespace App\Models;

use App\Models\Traits\Taggable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use AwStudio\Deeplable\Traits\Deeplable;
use Carbon\Carbon;
use Ignite\Crud\Models\Traits\HasMedia;
use Ignite\Crud\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Litstack\Meta\Metaable;
use Litstack\Meta\Traits\HasMeta;
use Spatie\MediaLibrary\HasMedia as HasMediaContract;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Post extends Model implements HasMediaContract, TranslatableContract, Metaable, Sitemapable
{
    use HasMedia, Translatable, Taggable, HasMeta, Deeplable;

    /**
     * The attributes that are mass assignable..
     *
     * @var array
     */
    protected $fillable = ['title', 'h1', 'text', 'excerpt', 'active', 'created_at', 'updated_at', 'published_at'];

    /**
     * The attributes to be translated.
     *
     * @var array
     */
    public $translatedAttributes = ['title', 'h1', 'text', 'excerpt', 'slug'];

    protected $metaAttributes = [
        'title'       => 'title',
        'description' => 'excerpt',
    ];

    protected $defaultMetaAttribute = [
        'title'       => 'AW-Studio Blog Post',
        'description' => 'This is a blog post by Alle Wetter //*.',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['image'];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['media', 'translations'];

    protected $casts = [
        'active' => 'boolean',
    ];

    /**
     * Image attribute.
     *
     * @return \Lit\Crud\Models\Media
     */
    public function getImageAttribute()
    {
        return $this->getMedia('image')->first();
    }

    public function sections()
    {
        return $this->repeatables('sections');
    }

    public function references()
    {
        return $this->manyRelation(Reference::class, 'references');
    }

    /**
     * Adding all blog posts to the sitemap.
     *
     * @return Url|string|array
     */
    public function toSitemapTag(): Url|string|array
    {
        return route('de.blog.show', $this);
        return Url::create(route('de.blog.show', $this))
            ->setLastModificationDate(Carbon::create($this->updated_at))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.1);

        return route('en.blog.show', $this);
        return Url::create(route('en.blog.show', $this))
            ->setLastModificationDate(Carbon::create($this->updated_at))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.1);
    }
}
