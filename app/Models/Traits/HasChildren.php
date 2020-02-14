<?php

namespace App\Models\Traits;

trait HasChildren
{
    /**
     * Return only the parent objects
     *
     * @param $query
     * @return mixed
     */
    public function scopeParents($query)
    {
        return $query->whereNull('parent_id');
    }
}
