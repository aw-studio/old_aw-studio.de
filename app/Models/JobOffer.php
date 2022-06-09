<?php

namespace App\Models;

use Litstack\Meta\Metaable;
use Litstack\Meta\Traits\HasMeta;
use Illuminate\Database\Eloquent\Model;
use Ignite\Crud\Models\Traits\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class JobOffer extends Model implements TranslatableContract, Metaable
{
    use Translatable, HasMeta;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','description','active','slug'];

    /**
     * The attributes to be translated.
     *
     * @var array
     */
    public $translatedAttributes = ['title','description','slug'];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['translations'];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

}
