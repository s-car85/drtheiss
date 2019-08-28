<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVaucerRequest;
use App\Http\Requests\UpdateVaucerRequest;
use App\Vaucer;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Yajra\Datatables\Facades\Datatables;

class VaucersController extends Controller
{
    protected $vaucers;

    public function __construct(Vaucer $vaucers)
    {
        $this->vaucers = $vaucers;

        parent::__construct();
    }

    public function index()
    {
        return view('admin.vaucers.index');
    }

    public function vaucersData()
    {
        $vaucers = $this->vaucers->latest();

        return Datatables::of($vaucers)
            ->addColumn('action', function($vaucers) {
                return view('admin.vaucers.action', compact('vaucers'))->render();
            })
            ->addColumn('action0', function($vaucers) {
                return view('admin.vaucers.action0', compact('vaucers'))->render();
            })
            ->addColumn('action1', function($vaucers) {
                return view('admin.vaucers.action1', compact('vaucers'))->render();
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->rawColumns(['action','action0', 'action1'])
            ->make(true);

    }

    public function updateActive(Request $request, $id){
        if($request->ajax()){
           $vaucers = $this->vaucers->findOrFail($id);
            if($request->get('active')){
                $vaucers->active = $request->get('active') == 'true';
            }
            $vaucers->save();

            return response()->json(['statut' => 'ok']);
        }
    }

    public function update(UpdateVaucerRequest $request, $id)
	{

        $vaucer = $this->vaucers->findOrfail($id);

        $vaucer->fill($request->only('vaucer_title', 'slug', 'vaucer_desc', 'vaucer_body', 'active'));

         if($request->hasFile('vaucer_image')) {

             $vaucer_image = $request->file('vaucer_image');
             $filename = time() . '.' . $vaucer_image->getClientOriginalExtension();

             Image::make($vaucer_image)->save(public_path('/uploads/vaucers/' . $filename));

             if (\File::exists(public_path() . $vaucer->vaucer_image)) {
                 \File::delete(public_path() . $vaucer->vaucer_image);
             }
             $vaucer->vaucer_image = '/uploads/vaucers/'.$filename;
         }

        if($request->hasFile('vaucer_banner')) {

            $vaucer_image = $request->file('vaucer_banner');
            $filename = time() . '.' . $vaucer_image->getClientOriginalExtension();

            Image::make($vaucer_image)->save(public_path('/uploads/vaucers-banner/' . $filename));

            if (\File::exists(public_path() . $vaucer->vaucer_banner)) {
                \File::delete(public_path() . $vaucer->vaucer_banner);
            }
            $vaucer->vaucer_banner = '/uploads/vaucers-banner/'.$filename;
        }

         $vaucer->save();

        flash()->overlay(trans('flash.success'),trans('flash.vaucers.supdated'));

        return redirect(route('admin.vaucers.index'));

	}

    public function create(Vaucer $vaucer)
    {
        return view('admin.vaucers.form', compact('vaucer'));
    }


    public function store(StoreVaucerRequest $request){

        $vaucer = $this->vaucers->fill(
            ['user_id' => auth()->user()->id ] +
            $request->only('vaucer_title', 'slug', 'vaucer_desc', 'vaucer_body', 'active')
        );

        if($request->hasFile('vaucer_image')) {

            $vaucer_image = $request->file('vaucer_image');
            $filename = time() . '.' . $vaucer_image->getClientOriginalExtension();

            Image::make($vaucer_image)->save(public_path('/uploads/vaucers/' . $filename));

            if (\File::exists(public_path() . $vaucer->vaucer_image)) {
                \File::delete(public_path() . $vaucer->vaucer_image);
            }
            $vaucer->vaucer_image = '/uploads/vaucers/'.$filename;
        }

        if($request->hasFile('vaucer_banner')) {

            $vaucer_image = $request->file('vaucer_banner');
            $filename = time() . '.' . $vaucer_image->getClientOriginalExtension();

            Image::make($vaucer_image)->save(public_path('/uploads/vaucers-banner/' . $filename));

            if (\File::exists(public_path() . $vaucer->vaucer_banner)) {
                \File::delete(public_path() . $vaucer->vaucer_banner);
            }
            $vaucer->vaucer_banner = '/uploads/vaucers-banner/'.$filename;
        }

        $vaucer->save();

        flash()->overlay(trans('flash.success'),trans('flash.vaucers.screated'));

        return redirect(route('admin.vaucers.index'));
    }

    public function edit($id)
    {
        $vaucer = $this->vaucers->findOrFail($id);

        return view('admin.vaucers.form', compact('vaucer'));
    }


    public function destroy($id)
    {
        $vaucer = $this->vaucers->findOrFail($id);

         if (\File::exists(public_path() . $vaucer->vaucer_image)) {
             \File::delete(public_path() . $vaucer->vaucer_image);
         }

        if (\File::exists(public_path() . $vaucer->vaucer_banner)) {
            \File::delete(public_path() . $vaucer->vaucer_banner);
        }

        $vaucer->delete();

        flash()->overlay(trans('flash.success'),trans('flash.vaucers.sdeleted'));

        return redirect(route('admin.vaucers.index'));
    }

    public function imageDelete(Request $request){

        if($request->ajax()){
             $vaucer = $this->vaucers->findOrFail($request->get('vaucer_id'));

             if (\File::exists(public_path() . $vaucer->vaucer_image)) {
                 \File::delete(public_path() . $vaucer->vaucer_image);
                 $vaucer->vaucer_image = null;
                 $vaucer->save();
             }
             return response('{}', 200);
        }

    }

    public function imagebannerDelete(Request $request){

        if($request->ajax()){
            $vaucer = $this->vaucers->findOrFail($request->get('vaucer_id'));

            if (\File::exists(public_path() . $vaucer->vaucer_banner)) {
                \File::delete(public_path() . $vaucer->vaucer_banner);
                $vaucer->vaucer_banner = null;
                $vaucer->save();
            }
            return response('{}', 200);
        }

    }


}
