<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class TechnologyTranslation extends Model
{
    

    /**
     * whether the model uses the default timestamp columns.
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Fillable attributes.
     *
     * @var array
     */
    protected $fillable = ['name','text','url'];


}
