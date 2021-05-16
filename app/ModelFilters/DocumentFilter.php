<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class DocumentFilter extends ModelFilter
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
        $this->whereLike('name', $string);
    }

    public function folder($folders)
    {

        $foldersArray = (explode(",", $folders));
        $this->related('folder', function ($query) use ($foldersArray) {

            return $query->whereIn('name', $foldersArray);

        });
    }

    public function theme($themes)
    {

        $themesArray = (explode(",", $themes));
        $this->related('folder.theme', function ($query) use ($themesArray) {

            return $query->whereIn('name', $themesArray);

        });
    }
    public function tech($techs)
    {

        $techsArray = (explode(",", $techs));
        $this->related('folder.theme.technology', function ($query) use ($techsArray) {

            return $query->whereIn('name', $techsArray);

        });
    }

}