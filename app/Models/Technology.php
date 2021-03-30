<?php

namespace App\Models;

use App\Models\Theme;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    
    public function themes()
    {
        return $this->hasMany(Theme::class);
        
    }
    //  public function folders()
    // {
    //     return $this->hasMany(Folder::class);
        
    // }
}