<?php

namespace App\Models;

use App\ModelFilters\DynamicModelFilter;
use EloquentFilter\Filterable;

trait DynamicallyFilterable
{
    use Filterable;

    /**
     * @return string
     */
    public function modelFilter(): string
    {
        return DynamicModelFilter::class;
    }
}
