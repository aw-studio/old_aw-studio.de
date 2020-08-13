<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Fjord\Crud\Models\Traits\TrackEdits;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia as HasMediaContract;
use Fjord\Crud\Models\Traits\HasMedia;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Fjord\Crud\Models\Traits\Translatable;

class Reference extends Model implements HasMediaContract, TranslatableContract
{
    use TrackEdits, HasMedia, Translatable;

    /**
     * Setup Model:
     *
     * Enter all fillable columns. Translated columns must also be set fillable.
     * Don't forget to also set them fillable in the coresponding translation-model!
     */

    /**
     * Fillable attributes
     *
     * @var array
     */
    protected $fillable = ['title', 'subtitle', 'excerpt', 'date', 'buzzwords', 'text', 'link_text', 'link_href', 'slug'];
    public $translatedAttributes = ['title', 'subtitle', 'excerpt', 'buzzwords', 'text', 'link_text', 'slug'];
    protected $appends = ['image', 'translation'];
    protected $with = ['media', 'translations'];


    /**
     * Append the translation to each query.
     *
     * @return array
     */
    public function getTranslationAttribute()
    {
        return $this->getTranslationsArray();
    }

    public function getImageAttribute()
    {
        return $this->getMedia('image')->first();
    }

    public function details()
    {
        return $this->repeatables('details');
    }
}
