<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests,
    Illuminate\Http\Request,
    App\Http\Controllers\Controller,
    Illuminate\Support\Facades\View,
    Illuminate\Support\Facades\App,
    Illuminate\Support\Facades\DB;
use App\Category;
use Illuminate\Support\Str;
use App\Http\Requests\PostCategoryRequest;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{

	public function __construct()
	{
		// filter to validate POST requests
        $this->middleware('ajax', ['only' => 'post']);
	}

	public function getIndex()
	{
		$categories = Category::withoutRoot()->orderBy('_lft', 'asc')
            ->get(['id', 'title as label', '_lft', '_rgt', 'parent_id'])->toTree();

		return View::make("admin.categories.brzo")->with("categoriesData", $categories);
	}

	public function postIndex(PostCategoryRequest  $request)
    {
    	// start transaction
    	DB::beginTransaction();

    	switch($request->action) {

			case "renameCategory":
				$status = Category::where("title", $request->originalname)
 								  ->where("id", $request->id)
 								  ->update(["title" => $request->title,
                                            "slug" => Str::slug($request->title)
                                            ]);
				break;

			case "addCategory":
				$sourceCategory = new Category([
                    'title' => $request->title,
                    "slug"  => Str::slug($request->title),
                    "class" => "fa-sitemap"
                ]);
				$targetCategory = Category::root();

				// append category to root
				if ( $status = $sourceCategory->appendTo($targetCategory)->save() ) {
					DB::commit();
					return ["id" => $sourceCategory->id, "parent_id" => $sourceCategory->parent_id];
				}
				break;

			case "deleteCategory":
				try {
					$category = Category::where("title", $request->title)
									    ->where("id", $request->id)
										->firstOrFail();
					$status = $category->delete();
				} catch (\Exception $e) {
					$status = false;
				}
				break;

			case "moveCategory":
				// get source/target categories from DB
				$sourceCategory = Category::find($request->id);
				$targetCategory = Category::find($request->to);



				// check for data consistency (can also do a try&catch instead)
				if ($sourceCategory && $targetCategory && ($sourceCategory->parent_id == $request->parent_id)) {
					switch ($request->direction) {
						case "inside" :
							$status = $sourceCategory->prependTo($targetCategory)->save();
							break;
						case "before" :
							$status = $sourceCategory->beforeNode($targetCategory)->save();
							break;
						case "after" :
							$status = $sourceCategory->afterNode($targetCategory)->save();
							break;
					}
				}
				break;
	   	}
    	if (!isset($status) || $status == null) { DB::rollback(); App::abort(400); }
    	DB::commit();
    }

}