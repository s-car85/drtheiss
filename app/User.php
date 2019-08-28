<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Jenssegers\Date\Date;

class User extends Authenticatable
{
    use Notifiable;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'avatar'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Date::parse($value)->format('d.m.Y.');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function vaucers()
    {
        return $this->hasMany(Vaucer::class);
    }
}
