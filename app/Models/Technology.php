<?php

namespace App\Models;

use App\Models\Report;
use App\Models\Theme;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = [
        'name',
    ];

    public function themes()
    {
        return $this->hasMany(Theme::class);

    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
    //  public function folders()
    // {
    //     return $this->hasMany(Folder::class);

    // }
}