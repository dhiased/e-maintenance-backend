<?php

namespace App\Models;

use App\Models\Folder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

     protected $fillable = [
        'name', 'technology_id'
    ];
    
    public function folders()
    {
        return $this->hasMany(Folder::class);
    }
}