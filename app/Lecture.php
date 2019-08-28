<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Lecture extends Model
{
    protected $fillable = ['name', 'email', 'calling', 'licence', 'foundation', 'phone', 'lecture_events_id', 'ip_adress', 'seen', 'archived'];

    public function getCreatedAtAttribute($value)
    {
        return Date::parse($value)->format('d.m.Y. H:i');
    }

    public function lectureEvents()
    {
        return $this->belongsTo(LectureEvent::class);
    }

    // scope unarchived
    public function scopeUnarchived($query){
        $query->where('archived', 0);
    }

    // scope archived
    public function scopeArchived($query){
        $query->where('archived', 1);
    }
}
