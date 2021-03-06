<?php

namespace App\Models;

use App\Models\Document;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = [
        'name', 'theme_id',
        // 'technology_id'
    ];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

}