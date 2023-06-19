<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Ignite\Crud\Models\Traits\HasMedia;
use Ignite\Crud\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia as HasMediaContract;

class Customer extends Model implements HasMediaContract, TranslatableContract
{
    use HasMedia, Translatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'suffix', 'category_id', 'url', 'active', 'logo_wall', 'logo_scale','description'];

    /**
     * The attributes to be translated.
     *
     * @var array
     */
    public $translatedAttributes = ['name', 'suffix','description','slug'];

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
        'logo_wall' => 'boolean',
    ];

    const RESEARCH = 1;
    const INDUSTRY = 2;
    const CULTURE = 3;

    /**
     * Image attribute.
     *
     * @return \Lit\Crud\Models\Media
     */
    public function getImageAttribute()
    {
        return $this->getMedia('image')->first();
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function scopeResearch($query)
    {
        return $query->where('category_id', self::RESEARCH);
    }

    public function scopeIndustry($query)
    {
        return $query->where('category_id', self::INDUSTRY);
    }

    public function scopeCulture($query)
    {
        return $query->where('category_id', self::CULTURE);
    }

    public function scopeHasLogo($query)
    {
        return $query->has('media');
    }

    public function references()
    {
        return $this->belongsToMany(Reference::class);
    }
}
