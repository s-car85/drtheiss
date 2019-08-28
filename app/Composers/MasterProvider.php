<?php

namespace App\Composers;

use App\Vaucer;
use Illuminate\Support\Facades\Cache;
use App\Category;
use App\Product;
use Illuminate\View\View;


class MasterProvider {

    /**
     * @param View $view
     */
    public function compose(View $view)
    {

        $view->categories = Category::withoutRoot()->orderBy('_lft', 'asc')->withDepth()->get()->toTree();

        $view->vaucers = Vaucer::whereActive(1)->get();


    }



}