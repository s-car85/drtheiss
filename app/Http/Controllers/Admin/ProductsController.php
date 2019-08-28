<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Yajra\Datatables\Facades\Datatables;

class ProductsController extends Controller
{
    protected $products;

    public function __construct(Product $products)
    {
        $this->products = $products;

        parent::__construct();
    }

    public function index()
    {
        return view('admin.products.index');
    }

    public function productsData()
    {

        $cats = Category::all();

        $products = $this->products->orderBy('active', 'ASC')->latest()->get();

        //$products = $this->products->get();

        return Datatables::of($products)
            ->addColumn('category', function($product)  use ($cats)  {
                return view('admin.products.category', compact('product','cats'))->render();
            })
            ->addColumn('action', function($products) {
                return view('admin.products.action', compact('products'))->render();
            })
            ->addColumn('action0', function($products) {
                return view('admin.products.action0', compact('products'))->render();
            })
            ->addColumn('action1', function($products) {
                return view('admin.products.action1', compact('products'))->render();
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->rawColumns(['category','action','action0', 'action1'])
            ->make(true);

    }

    public function updateActive(Request $request, $id){
        if($request->ajax()){
           $products = $this->products->findOrFail($id);
            if($request->get('active')){
                $products->active = $request->get('active') == 'true';
            }
            $products->save();

            return response()->json(['statut' => 'ok']);
        }
    }

    public function update(UpdateProductRequest $request, $id)
	{

        $products = $this->products->findOrfail($id);

        $products->fill($request->only(
            'title',
            'short_description',
            'description',
            'image',
            'category_id',
            'active'
        ));

         if($request->hasFile('product_image')) {

             $product_image = $request->file('product_image');
             $filename = time() . '.' . $product_image->getClientOriginalExtension();

             Image::make($product_image)->save(public_path('/uploads/products/' . $filename));

             if (\File::exists(public_path() . $products->product_image) && $products->product_image!=='/uploads/products/no-image.jpg') {
                 \File::delete(public_path() . $products->product_image);
             }
             $products->product_image = '/uploads/products/'.$filename;
         }

         $products->save();

        flash()->overlay(trans('flash.success'),trans('flash.products.supdated'));

        return redirect(route('admin.products.index'));

	}

    public function create(Product $product)
    {

        $categories = $this->getParents();

        return view('admin.products.form', compact('product', 'categories'));
    }


    public function store(StoreProductRequest $request){

        $product = $this->products->create(
            $request->only(
            'title',
            'short_description',
            'description',
            'image',
            'category_id',
            'active')
        );

         if($request->hasFile('product_image')) {

             $product_image = $request->file('product_image');
             $filename = time() . '.' . $product_image->getClientOriginalExtension();

             Image::make($product_image)->save(public_path('/uploads/products/' . $filename));

             if (\File::exists(public_path() . $product->product_image) && $product->product_image !== '/uploads/products/no-image.jpg') {
                 \File::delete(public_path() . $product->product_image);
             }
             $product->product_image = '/uploads/products/'.$filename;
         }

         $product->save();

        flash()->overlay(trans('flash.success'),trans('flash.products.screated'));

        return redirect(route('admin.products.index'));
    }

    public function edit($id)
    {
        $product = $this->products->findOrFail($id);

        $categories = $this->getParents();

        return view('admin.products.form', compact('product', 'categories'));
    }


    public function destroy($id)
    {
        $products = $this->products->findOrFail($id);

         if (\File::exists(public_path() . $products->product_image)  && $products->product_image!=='/uploads/products/no-image.jpg') {
             \File::delete(public_path() . $products->product_image);
               $products->product_image = '/uploads/products/no-image.jpg';
         }

        $products->delete();

        flash()->overlay(trans('flash.success'),trans('flash.products.sdeleted'));

        return redirect(route('admin.products.index'));
    }

    public function imageDelete(Request $request){

        if($request->ajax()){
             $products = $this->products->findOrFail($request->get('product_id'));

             if (\File::exists(public_path() . $products->product_image) && $products->product_image !== '/uploads/products/no-image.jpg') {
                 \File::delete(public_path() . $products->product_image);
                 $products->product_image = '/uploads/products/no-image.jpg';
                 $products->save();
             }
             return response('{}', 200);
        }

    }

    protected function getParents()
    {
        $all = Category::select('id', 'title')->withoutRoot()->orderBy('_lft', 'asc')->withDepth()->defaultOrder()->get();
        $result =  [];

        foreach ($all as $item)
        {
            $title = $item->title;

            if ($item->depth > 0) $title = str_repeat('—', $item->depth).' '.$title;

            $result[$item->id] = $title;
        }

        return $result;
    }


}
