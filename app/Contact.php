<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Contact extends Model
{
    protected $fillable = ['name', 'email', 'theme', 'question', 'ip_adress', 'seen'];

    public function getCreatedAtAttribute($value)
    {
        return Date::parse($value)->format('d.m.Y. H:i');
    }
}
