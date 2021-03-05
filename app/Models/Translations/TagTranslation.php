<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class TagTranslation extends Model
{
    /**
     * whether the model uses the default timestamp columns.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Fillable attributes.
     *
     * @var array
     */
    protected $fillable = ['title'];
}
