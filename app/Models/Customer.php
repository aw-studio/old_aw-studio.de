<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Fjord\Crud\Models\Traits\TrackEdits;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Fjord\Crud\Models\Traits\Translatable;

class Customer extends Model implements TranslatableContract
{
    use TrackEdits, Translatable;

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
    protected $fillable = ['name', 'suffix' , 'category_id', 'url'];
    public $translatedAttributes = ['name', 'suffix'];
	   protected $appends = ['translation'];
    protected $with = ['translations'];

    const RESEARCH = 1;
    const INDUSTRY = 2;
    const CULTURE = 3;

        /**
     * Append the translation to each query.
     *
     * @return array
     */
    public function getTranslationAttribute()
    {
        return $this->getTranslationsArray();
    }

    public function scopeResearch($query) {
       return $query->where('category_id', Customer::RESEARCH);
    }

    public function scopeIndustry($query) {
       return $query->where('category_id', Customer::INDUSTRY);
    }

    public function scopeCulture($query) {
       return $query->where('category_id', Customer::CULTURE);
    }


//
// Economy
// ArtCulture

}
