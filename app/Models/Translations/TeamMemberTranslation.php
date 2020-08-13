<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class TeamMemberTranslation extends Model
{


    /**
     * Timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Fillable attributes.
     *
     * @var array
     */
    protected $fillable = ['name', 'position', 'profession'];


}
