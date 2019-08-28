<?php

namespace App\Composers;

use App\Category;
use Illuminate\View\View;


class CategoriesProvider
{

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
       // $view->categories = Category::withDepth()->having('depth', '<=', 1)->get()->toTree();
        $view->categories  = Category::withoutRoot()->orderBy('_lft', 'asc')->withDepth()->get()->toTree();

        //dd( $view->categories );
    }



}