<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Intervention;
use App\Category;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Product;


class ProductsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show','searchByTermPaginated']]);
    }

	public function index($slug, $id=null, Request $input, $perPage = 8)
    {

        if(isset($id)){
            $cats = Category::withoutRoot()->where('id', $id)->firstOrFail();
        }elseif(isset($slug)){
            $cats = Category::withoutRoot()->where('slug', $slug)->firstOrFail();
        }


        $subCats = $cats->getDescendants();


        $products = Product::categorized($cats)->actived()->latest()->paginate($perPage);;

        if( $subCats->count() ){
              return view('front.products.subcats', compact('cats', 'subCats'));
        }

        return view('front.products.index', compact('cats', 'products'));

	}

    public function searchByTermPaginated(Request $input, $perPage = 8)
    {
        $term     = $input->get('q');
        $products = null;
        $search_terms = explode(' ', $term);

        $cats = Category::withoutRoot()->firstOrFail();

        $subCats = new \Illuminate\Support\Collection($cats);
        $subCats->sortBy('_lft');

        $count = DB::select(
                DB::raw("
               SELECT parent.slug, parent.id, parent.title, COUNT(products.title) AS product_count
                FROM categories AS node ,
                      categories AS parent, products
                WHERE node._lft BETWEEN parent._lft AND parent._rgt AND node.id = products.category_id
                AND products.active = 1
                GROUP BY parent.slug, parent.id;
        "));

        $products = Product::where(function ($q) use ($search_terms) {
            foreach ($search_terms as $keyword) {
                if ($keyword != '') {
                    $q->orWhere('title', 'LIKE', '%' . $keyword . '%');
                }
            }
        })->latest()
            ->actived()
            ->paginate($perPage);

       return view('front.products.result', compact('products', 'term', 'count', 'cats', 'subCats'));

    }

	public function show($slug, $id=null)
	{
        if(isset($id)){
            $product = Product::where('id', $id)->actived()->latest()->firstOrFail();
        }elseif(isset($slug)){
            $product = Product::where('slug', $slug)->actived()->latest()->firstOrFail();
        }


        $cats = $product->category()->first();

        //$subCats = new \Illuminate\Support\Collection($cats->children);
        //$subCats->sortBy('_lft');

        return view('front.products.show', compact('product', 'cats'));
	}


}
