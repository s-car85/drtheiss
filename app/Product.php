<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Product extends Model {

    protected  $fillable = [
        'title',
        'description',
        'short_description',
        'image',
        'product_image',
        'category_id',
        'active',
    ];


    // scope actived product
    public function scopeActived($query){
        $query->where('active', 1);
    }

    public function getCreatedAtAttribute($value)
    {
        return Date::parse($value)->format('d.m.Y.');
    }

    // scope products for certain category
    public function scopeCategorized($query, Category $category = null) {

        $catIds = $category->getDescendants()->pluck('id');

        $catIds[] = $category->id;

        return $query->whereIn('category_id', $catIds);
    }


    // Belogns to category
    public function category()
    {
        return $this->belongsTo('App\Category');
	}

//    public function images(){
//        return $this->belongsToMany('App\Image', 'products_images')->orderBy('order');
//    }

    public function setActiveAttribute($value)
    {
        if($value == null){
            return $this->attributes['active'] = false;
        }
         return $this->attributes['active'] = true;
    }

}
