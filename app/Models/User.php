<?php

namespace App\Models;

use App\Models\Document;
use App\Models\Report;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

// class User extends Authenticatable
// {
//     use HasFactory, Notifiable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, HasFactory, HasRoles, Filterable;

// Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function scopeIsAdmin()
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');

        });

    }

    public function scopeIsManager()
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', 'manager');

        });

    }

    public function scopeIsUser()
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', 'user');

        });

    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'registration_number',
        'profession',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $with = [
        'roles',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

}