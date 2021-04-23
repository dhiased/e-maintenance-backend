<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

     protected $fillable = [
        'name', 'theme_id','technology_id' ,	'language' , 'format' , 'path' , 'user_id', 'folder_id'
        
    ];
}