<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\PostCategoryRequest;

use Illuminate\Http\Request;
use Kalnoy\Nestedset\Collection;
use Illuminate\Support\Facades\Cache;


class CategoriesController extends Controller {


    public function __construct()
    {
        $this->middleware('ajax', ['only' => 'getsubscats']);
         parent::__construct();
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.categories.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $input)
	{
        $data = $input->only('parent_id');

        $categories = $this->getParents();

		return view('admin.categories.create', compact('data', 'categories'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param PostCategoryRequest $input
     *
     * @return Response
     */
	public function store(PostCategoryRequest $input)
	{

        $category = new Category();
        $category->title = $input->title;
        $category->slug = Str::slug($input->title);
        $category->image = $input->image ? $input->image : '';
        $category->simage = $input->simage ? $input->simage : '';
        $category->logo = $input->logo ? $input->logo : '';
        $category->parent_id = $input->parent_id;
        $category->save();


        flash()->overlay(trans('flash.success'), 'Kategorija je uspesno kreirana.');

//        \Cache::forget('categories');
//
//
//        \Session::flash('flash_message', 'Kategorija je uspesno kreirana.');
//        \Session::flash('flash_message_important', true);

        return redirect()->route('admin.categories.show', [ $category->getKey()]);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

        $categories = Category::findOrFail($id);

        return view('admin.categories.show', compact('categories', $categories));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		/** @var Category $category */
		$category = Category::findOrFail($id);

		//$categories = $this->getCategoryOptions($category);
        $categories = $this->getParents();

		return view('admin.categories.edit', compact('category', 'categories'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(PostCategoryRequest $input, $id)
	{
		/** @var Category $category */
		$category = Category::findOrFail($id);
        $category->title = $input->title;
        $category->slug = Str::slug($input->title);
        $category->image = $input->image ? $input->image : '';
        $category->simage = $input->simage ? $input->simage : '';
        $category->logo = $input->logo ? $input->logo : '';
        $category->parent_id = $input->parent_id;
        $category->update();

         flash()->overlay(trans('flash.success'), 'Kategorija je uspesno updejtovana.');

//        \Cache::forget('categories');
//
//        \Session::flash('flash_message', 'Kategorija je uspesno updejtovana.');
//        \Session::flash('flash_message_important', true);

		return redirect()->route('admin.categories.show', [ $id ]);
	}

    /**
     * Get the nested result for html select in view.
     *
     * @return array $results
     */
    protected function getParents()
    {

        $all = Category::select('id', 'title')->withoutRoot()->orderBy('_lft', 'asc')->withDepth()->defaultOrder()->get();

        $result =  $options = [ 1 => '+++Root+++' ];

        foreach ($all as $item)
        {
            $title = $item->title;

            if ($item->depth > 0) $title = str_repeat('—', $item->depth).' '.$title;

            $result[$item->id] = $title;
        }

        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        \Cache::forget('categories');

        if ($category->delete())
        {

            flash()->overlay(trans('flash.success'), 'Kategorija je uspesno obrisana.');

            return redirect()->route('admin.categories.index');
        }
        else
        {
           flash()->overlay(trans('flash.danger'), 'Kategorija nije obrisana.');

            return redirect()->route('admin.categories.index');
        }
    }


    public function getChildern(Request $request, $id){

        $categories = Category::findOrFail($id);

        if($categories->hasChildren()){
            $data = [];
            foreach($categories->children as $child){
                $data[]=[
                  'id' => $child->id, 'title' => $child->title
                ];
            }
            return response()->json($data);
        }
    }



}
