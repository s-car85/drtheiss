<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUserRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests;

class UsersController extends Controller
{
    protected $users;

    public function __construct(User $users)
    {
        $this->users = $users;

        parent::__construct();
    }

    public function index()
    {
        return view('admin.users.index');
    }

    public function usersData()
    {
         $users = $this->users->with('posts')->get();

        return Datatables::of($users)
            ->addColumn('avatar', function($users) {
                return view('admin.users.avatar', compact('users'))->render();
            })
            ->addColumn('action', function($users) {
                return view('admin.users.action', compact('users'))->render();
            })
            ->addColumn('action1', function($users) {
                return view('admin.users.action1', compact('users'))->render();
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->rawColumns(['avatar', 'action', 'action1'])
            ->make(true);
    }

    public function profile(User $user)
    {
        return view('admin.users.profile', compact('user'));
    }

    public function updateProfile(ProfileUserRequest $request)
    {
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->fit(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
            $user = Auth::user();
            if(\File::exists( public_path().$user->avatar )){
                \File::delete( public_path().$user->avatar );
            }
            $user->avatar = '/uploads/avatars/' . $filename;
            $user->fill($request->only('name', 'password'));
            $user->save();
        }else{
            $user = Auth::user();
            $user->fill($request->only('name', 'password'));
            $user->save();
        }

        flash()->success(trans('flash.success'),trans('flash.users.supdated'));

        return redirect(route('admin.users.profile') );
    }

    public function create(User $user)
    {
        return view('admin.users.form', compact('user'));
    }

    public function store(Requests\StoreUserRequest $request)
    {
        $this->users->create($request->only('name', 'email', 'password'));

        flash()->overlay(trans('flash.success'),trans('flash.users.screated'));

        return redirect(route('admin.users.index'));
    }

    public function edit($id)
    {
        $user = $this->users->findOrFail($id);

        return view('admin.users.form', compact('user'));
    }

    public function update(Requests\UpdateUserRequest $request, $id)
    {
        $user = $this->users->findOrFail($id);

        $user->fill($request->only('name', 'password'))->save();

        flash()->success(trans('flash.success'),trans('flash.users.supdated'));

        return redirect(route('admin.users.index'));
    }

    public function destroy(Requests\DeleteUserRequest $request, $id)
    {
        $user = $this->users->findOrFail($id);

        $user->delete();

        flash()->overlay(trans('flash.success'),trans('flash.users.sdeleted'));

        return redirect(route('admin.users.index'));
    }
}
