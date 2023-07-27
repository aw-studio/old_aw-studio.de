<?php

namespace App\Models;

use Carbon\Carbon;
use Litstack\Meta\Metaable;
use Spatie\Sitemap\Tags\Url;
use App\Models\Traits\Taggable;
use Litstack\Meta\Traits\HasMeta;
use Ignite\Crud\Models\Traits\HasMedia;
use Illuminate\Database\Eloquent\Model;
use AwStudio\Deeplable\Traits\Deeplable;
use Spatie\Sitemap\Contracts\Sitemapable;
use Ignite\Crud\Models\Traits\Translatable;
use Spatie\MediaLibrary\HasMedia as HasMediaContract;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

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
     * Adding all blog posts to the sitemap
     *
     * @return Url|string|array
     */
    public function toSitemapTag(): Url | string | array
    {
        return route('blog.post.show', $this);
        return Url::create(route('blog.show', $this))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.1);
    }
}
