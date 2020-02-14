<?php

namespace App\Models\Traits;

trait IsOrderable
{
    /**
     * Return ordered objects
     *
     * @param $query
     * @param string $direction
     * @return mixed
     */
    public function scopeOrdered($query, $direction = 'asc')
    {
        return $query->orderBy('order', $direction);
    }
}
