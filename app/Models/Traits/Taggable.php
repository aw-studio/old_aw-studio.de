<?php

namespace App\Models\Traits;

use App\Models\Tag;

trait Taggable
{
    /**
     * Get all of the tags for the post.
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
