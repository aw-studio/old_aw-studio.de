<?php

namespace App\Models;

use Litstack\Meta\Metaable;
use App\Models\Traits\Taggable;
use Litstack\Meta\Traits\HasMeta;
use Ignite\Crud\Models\Traits\HasMedia;
use Illuminate\Database\Eloquent\Model;
use AwStudio\Deeplable\Traits\Deeplable;
use Ignite\Crud\Models\Traits\Translatable;
use Spatie\MediaLibrary\HasMedia as HasMediaContract;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Post extends Model implements HasMediaContract, TranslatableContract, Metaable
{
    use HasMedia, Translatable, Taggable, HasMeta, Deeplable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'excerpt', 'active'];

    /**
     * The attributes to be translated.
     *
     * @var array
     */
    public $translatedAttributes = ['title', 'excerpt', 'slug'];

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
}
