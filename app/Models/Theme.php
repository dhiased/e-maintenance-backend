<?php

namespace App\Models;

use App\Models\Folder;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = [
        'name', 'technology_id',
    ];
    protected $with = [
        'technology',
    ];

    public function folders()
    {
        return $this->hasMany(Folder::class);
    }

    public function technology()
    {
        return $this->belongsTo(Technology::class);
    }

}