<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Jenssegers\Date\Date;

class Testimonial extends Model
{

    protected $fillable = ['name', 'profession', 'body', 'avatar'];

    public function getCreatedAtAttribute($value)
    {
        Date::setLocale('sr-SP');
        return ucfirst(Date::parse($value)->format('F d, Y H:i'));
    }



}
