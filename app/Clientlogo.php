<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Clientlogo extends Model
{

    protected $fillable = ['title', 'url', 'logo'];

    public function getCreatedAtAttribute($value)
    {
        Date::setLocale('sr-SP');
        return ucfirst(Date::parse($value)->format('F d, Y H:i'));
    }

}
