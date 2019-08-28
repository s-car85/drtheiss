<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Testimonial;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Yajra\Datatables\Facades\Datatables;

class TestimonialController extends Controller
{
    protected $testimonial;

    public function __construct(Testimonial $testimonial)
    {
        $this->testimonial = $testimonial;

        parent::__construct();
    }

    public function index()
    {
        return view('admin.clients.testimonials.index');
    }


    public function testmData()
    {
        $testimonial = $this->testimonial->get();

        return Datatables::of($testimonial)
            ->addColumn('avatar', function($testimonial) {
                return view('admin.clients.testimonials.avatar', compact('testimonial'))->render();
            })
            ->addColumn('action0', function($testimonial) {
                return view('admin.clients.testimonials.action0', compact('testimonial'))->render();
            })
            ->addColumn('action1', function($testimonial) {
                return view('admin.clients.testimonials.action1', compact('testimonial'))->render();
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->rawColumns(['avatar','action0','action1'])
            ->make(true);

    }

    public function create(Testimonial $testimonial)
    {
        return view('admin.clients.testimonials.form', compact('testimonial'));
    }

    public function edit($id)
    {
        $testimonial = $this->testimonial->findOrFail($id);

        return view('admin.clients.testimonials.form', compact('testimonial'));
    }

    public function update(UpdateTestimonialRequest $request, $id)
    {
        $testimonial = $this->testimonial->findOrfail($id);

        $testimonial->fill($request->only('name', 'profession', 'body'));

        if($request->hasFile('avatar')){

            $filename = $this->uploadImage($request->file('avatar'));

            if (\File::exists(public_path() . $testimonial->avatar)) {
                 \File::delete(public_path() . $testimonial->avatar);
             }

            $testimonial->avatar = '/uploads/testimonials/' . $filename;
        }

        $testimonial->save();

        flash()->success(trans('flash.success'),trans('flash.testimonials.tupdated'));

        return redirect( url('admin/testimonials') );

    }

    public function store(StoreTestimonialRequest $request)
    {
        if($request->hasFile('avatar')){

            $filename = $this->uploadImage($request->file('avatar'));

            $this->testimonial->create(
                ['avatar' => '/uploads/testimonials/' . $filename] +
                $request->only('name', 'profession', 'body')
            );

        }else{
            $this->testimonial->create($request->only('name', 'profession', 'body'));
        }

        flash()->success(trans('flash.success'),trans('flash.testimonials.tcreated'));

        return redirect( url('admin/testimonials') );
    }

    public function uploadImage($imageFile)
    {
        $filename = time() . '.' . $imageFile->getClientOriginalExtension();

        Image::make($imageFile)->fit(120, 120)->save( public_path('/uploads/testimonials/' . $filename ) );

        return $filename;
    }

    public function imageDelete(Request $request){

        if($request->ajax()){
             $testimonial = $this->testimonial->findOrFail($request->get('testimonial_id'));

             if (\File::exists(public_path() . $testimonial->avatar)) {
                 \File::delete(public_path() . $testimonial->avatar);
                 $testimonial->avatar = null;
                 $testimonial->save();
             }
             return response('{}', 200);
        }

    }

    public function destroy($id)
    {
        $testimonial = $this->testimonial->findOrFail($id);

         if (\File::exists(public_path() . $testimonial->avatar)) {
             \File::delete(public_path() . $testimonial->avatar);
         }

        $testimonial->delete();

        flash()->overlay(trans('flash.success'),trans('flash.testimonials.tdeleted'));

        return redirect(route('admin.testimonials.index'));
    }

}
