<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ReportFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function search($string)
    {
        $this->whereLike('title', $string)->orWhere('description', 'LIKE', "%{$string}%");
        // $this->whereLike('description', $string);

    }

}