<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    protected $posts;


    public function __construct(Post $posts)
    {
        $this->posts = $posts;

    }

    public function index(Request $request)
    {
        $posts = $this->posts->whereActive(1)->latest()->paginate(8);

        if($request->ajax()){
            return [
                'posts' => view('front.posts.ajaxposts',  compact('posts', $posts))->render(),
                'next_page' => $posts->nextPageUrl()
            ];
        }

        return view('front.posts.index', compact('posts', $posts));
    }

    public function searchByTermPaginated(Request $input, $perPage = 8)
    {
        $term     = $input->get('q');
        $products = null;
        $search_terms = explode(' ', $term);

        $posts = Post::where(function ($q) use ($search_terms) {
            foreach ($search_terms as $keyword) {
                if ($keyword != '') {
                    $q->orWhere('post_title', 'LIKE', '%' . $keyword . '%')
                      ->orWhere('post_body', 'LIKE', '%' . $keyword . '%');
                }
            }
        })->whereActive(1)->latest()->paginate($perPage);

        if($input->ajax()){
            return [
                'posts' => view('front.posts.ajaxposts',  compact('posts', $posts))->render(),
                'next_page' => $posts->nextPageUrl()
            ];
        }

        return view('front.posts.result', compact('posts','term'));

    }

    public function show($slug)
    {
        $post = $this->posts->where('slug', $slug)->firstOrFail();

        return view('front.posts.show', compact('post', $post));
    }
}
