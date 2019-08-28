<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Yajra\Datatables\Facades\Datatables;

class PostsController extends Controller
{
    protected $posts;

    public function __construct(Post $posts)
    {
        $this->posts = $posts;

        parent::__construct();
    }

    public function index()
    {
        return view('admin.posts.index');
    }

    public function postsData()
    {
        $posts = $this->posts->latest();

        return Datatables::of($posts)
            ->addColumn('action', function($posts) {
                return view('admin.posts.action', compact('posts'))->render();
            })
            ->addColumn('action0', function($posts) {
                return view('admin.posts.action0', compact('posts'))->render();
            })
            ->addColumn('action1', function($posts) {
                return view('admin.posts.action1', compact('posts'))->render();
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->rawColumns(['action','action0', 'action1'])
            ->make(true);

    }

    public function updateActive(Request $request, $id){
        if($request->ajax()){
           $posts = $this->posts->findOrFail($id);
            if($request->get('active')){
                $posts->active = $request->get('active') == 'true';
            }
            $posts->save();

            return response()->json(['statut' => 'ok']);
        }
    }

    public function update(UpdatePostRequest $request, $id)
	{

        $post = $this->posts->findOrfail($id);

        $post->fill($request->only('post_title', 'slug', 'post_desc', 'post_body', 'active'));

         if($request->hasFile('post_image')) {

             $post_image = $request->file('post_image');
             $filename = time() . '.' . $post_image->getClientOriginalExtension();

             Image::make($post_image)->save(public_path('/uploads/posts/' . $filename));

             if (\File::exists(public_path() . $post->post_image)) {
                 \File::delete(public_path() . $post->post_image);
             }
             $post->post_image = '/uploads/posts/'.$filename;
         }

         $post->save();

        flash()->overlay(trans('flash.success'),trans('flash.posts.supdated'));

        return redirect(route('admin.posts.index'));

	}

    public function create(Post $post)
    {
        return view('admin.posts.form', compact('post'));
    }


    public function store(StorePostRequest $request){

        $post = $this->posts->fill(
            ['user_id' => auth()->user()->id ] +
            $request->only('post_title', 'slug', 'post_desc', 'post_body', 'active')
        );

        if($request->hasFile('post_image')) {

            $post_image = $request->file('post_image');
            $filename = time() . '.' . $post_image->getClientOriginalExtension();

            Image::make($post_image)->save(public_path('/uploads/posts/' . $filename));

            if (\File::exists(public_path() . $post->post_image)) {
                \File::delete(public_path() . $post->post_image);
            }
            $post->post_image = '/uploads/posts/'.$filename;
        }

        $post->save();

        flash()->overlay(trans('flash.success'),trans('flash.posts.screated'));

        return redirect(route('admin.posts.index'));
    }

    public function edit($id)
    {
        $post = $this->posts->findOrFail($id);

        return view('admin.posts.form', compact('post'));
    }


    public function destroy($id)
    {
        $post = $this->posts->findOrFail($id);

         if (\File::exists(public_path() . $post->post_image)) {
             \File::delete(public_path() . $post->post_image);
         }

        $post->delete();

        flash()->overlay(trans('flash.success'),trans('flash.posts.sdeleted'));

        return redirect(route('admin.posts.index'));
    }

    public function imageDelete(Request $request){

        if($request->ajax()){
             $post = $this->posts->findOrFail($request->get('post_id'));

             if (\File::exists(public_path() . $post->post_image)) {
                 \File::delete(public_path() . $post->post_image);
                 $post->post_image = null;
                 $post->save();
             }
             return response('{}', 200);
        }

    }


}
