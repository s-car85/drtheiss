<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Kalnoy\Nestedset\NodeTrait;
use PhpParser\Node\Expr\AssignOp\Mod;

/**
 * Class Category
 *
 * @param string $title
 *
 * @package App
 */
class Category extends Model
{
    use NodeTrait;
    /**
     * @var array
     */
    protected $fillable = [
        'title', 'parent_id', 'slug', 'simage', 'logo', 'image'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function products()
    {
        return $this->hasMany('App\Product', 'category_id');
    }

//    public function setSlugAttribute($value)
//
//    {
//
//        $slug = Str::slug($value);
//
//        $slugCount = count( $this->whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->get() );
//
//        $slugFinal = ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
//
//        $this->attributes['slug'] = $slugFinal;
//
//    }



}
