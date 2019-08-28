<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Lecture;
use App\Post;
use App\Services\Medias;
use App\User;
use Illuminate\Http\Request;


class AdminController extends Controller
{

    protected $users, $contacts, $orders, $posts;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $users, Contact $contacts, Post $posts, Lecture $lectures)
    {
        $this->users = $users;
        $this->contacts = $contacts;
        $this->lectures = $lectures;
        $this->posts = $posts;
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nbrUsers = $this->users->count();
        $nbrPosts = $this->posts->whereActive(1)->count();
        $nbrLectures = $this->lectures->unarchived()->whereSeen(0)->count();

        return view('admin.dashboard.index', compact('nbrUsers', 'nbrOrders', 'nbrPosts', 'nbrLectures' ));
    }

      /**
     * Show the application login form for admin area.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('admin.login');
    }

    public function filemanager()
    {
        $url = Medias::getUrl();

        return view('admin.filemanager', compact('url'));
    }
}
