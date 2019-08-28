<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class LectureEvent extends Model
{

    protected $fillable = ['title', 'theme', 'lecturers', 'active'];

    public function getCreatedAtAttribute($value)
    {
        return Date::parse($value)->format('d.m.Y. H:i');
    }
    public function setActiveAttribute($value)
    {
        if($value == null){
            return $this->attributes['active'] = false;
        }
        return $this->attributes['active'] = true;

    }
    public function lecture()
    {
        return $this->hasMany('App\Lecture');
    }


}
