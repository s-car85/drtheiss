<?php

namespace App\Http\Controllers;

use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class StemapController extends Controller
{
    public function index(){

        $yesterday = new Carbon('yesterday');
        $lastWeek = new Carbon('last week');
        $lastMonth = new Carbon('last month');

         $sitemap = App::make("sitemap");

          // Add static pages like this:
         $sitemap->add(URL::to('/'), $yesterday, '1.0', 'daily');

         $sitemap->add(URL::to('/lekovito-bilje'), $yesterday, '1.0', 'weekly');

        $sitemap->add(URL::to('/o-kompaniji'), $yesterday, '1.0', 'weekly');

        $sitemap->add(URL::to('/kontakt'), $yesterday, '1.0', 'weekly');

        $sitemap->add(URL::to('/pravila-uslovi-koriscenja-sajta'), $yesterday, '1.0', 'weekly');

        $sitemap->add(URL::to('/prijava'), $yesterday, '1.0', 'weekly');

        $sitemap->add(URL::to('/vauceri'), $yesterday, '1.0', 'weekly');

        $sitemap->add(URL::to('/blog'), $yesterday, '1.0', 'weekly');


         // get all posts from db
         $products = DB::table('products')->where('active',1)->orderBy('created_at', 'desc')->get();
         $posts = DB::table('posts')->where('active',1)->orderBy('created_at', 'desc')->get();
         $vaucers = DB::table('vaucers')->where('active',1)->orderBy('created_at', 'desc')->get();
         $categories = Category::withoutRoot()->orderBy('_lft', 'asc')->withDepth()->get();

         // add every post to the sitemap
         foreach ($products as $product)
         {
            $sitemap->add(URL::to("proizvod/".str_slug($product->title)."/".$product->id), $product->created_at, '0.9', 'weekly');
         }
        // add every post to the sitemap
        foreach ($posts as $post)
        {
            $sitemap->add(URL::to("blog/".str_slug($post->slug)), $post->created_at, '0.9', 'weekly');
        }

        foreach ($vaucers as $vaucer)
        {
            $sitemap->add(URL::to("vauceri/".str_slug($vaucer->slug)), $vaucer->created_at, '0.9', 'weekly');
        }

        foreach($categories as $category) {
            $sitemap->add(URL::to("proizvodi/{$category->slug}/{$category->id}"), $category->created_at, '0.9', 'weekly');
        }

        // Now, output the sitemap:
        return $sitemap->render('xml');
    }
}
