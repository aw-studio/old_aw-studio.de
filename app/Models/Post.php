<?php

namespace App\Models;

use App\Models\Traits\Taggable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Ignite\Crud\Models\Traits\HasMedia;
use Ignite\Crud\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Litstack\Meta\Metaable;
use Litstack\Meta\Traits\HasMeta;
use Spatie\MediaLibrary\HasMedia as HasMediaContract;

class Post extends Model implements HasMediaContract, TranslatableContract, Metaable
{
    use HasMedia, Translatable, Taggable, HasMeta;

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

    protected $defaultMetaAttribute = [
        'title'       => 'blablabla',
        'description' => 'blablabla',
        'keywords'    => 'blablabla',
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
