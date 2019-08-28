<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Jenssegers\Date\Date;

class Post extends Model
{

    protected $fillable = ['post_title', 'slug', 'post_desc', 'post_image', 'post_body', 'active', 'user_id'];

    public function getCreatedAtAttribute($value)
    {
        Date::setLocale('sr-SP');
        return ucfirst(Date::parse($value)->format('F d, Y'));
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function setSlugAttribute($value)

    {
        $slug = Str::slug($value);

        $slugCount = count( $this->whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->get() );

        $slugFinal = ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;

        $this->attributes['slug'] = $slugFinal;

    }

    public function setActiveAttribute($value)
    {
        if($value == null){
            return $this->attributes['active'] = false;
        }
         return $this->attributes['active'] = true;
    }
}
