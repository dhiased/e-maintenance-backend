<?php

namespace App\Models;

use App\Models\Technology;
use App\Models\User;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = [
        'title', 'description', 'technology_id', 'user_id',
    ];

    public function technology()
    {
        return $this->belongsTo(Technology::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}