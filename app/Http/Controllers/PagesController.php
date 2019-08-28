<?php

namespace App\Http\Controllers;


use App\Category;
use App\Http\Requests;

class PagesController extends Controller
{

    public function createroot(){

        $root = Category::create([
            'title' => 'Root',
            'slug'  => '',
            'simage'=> '',
            'logo'  => '',
            'image' => ''
        ]);

        $root->makeRoot()->save();

        return "ok";
    }

}
