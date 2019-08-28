<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientlogosRequest;
use App\Http\Requests\UpdateClientlogosRequest;
use App\Clientlogo;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Yajra\Datatables\Facades\Datatables;

class ClientlogosController extends Controller
{
    protected $logo;

    public function __construct(Clientlogo $logo)
    {
        $this->logo = $logo;

        parent::__construct();
    }

    public function index()
    {
        return view('admin.clients.logos.index');
    }


    public function logosData()
    {
        $logo = $this->logo->get();

        return Datatables::of($logo)
            ->addColumn('logo', function($logo) {
                return view('admin.clients.logos.logo', compact('logo'))->render();
            })
            ->addColumn('action0', function($logo) {
                return view('admin.clients.logos.action0', compact('logo'))->render();
            })
            ->addColumn('action1', function($logo) {
                return view('admin.clients.logos.action1', compact('logo'))->render();
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->rawColumns(['logo','action0','action1'])
            ->make(true);

    }

    public function create(Clientlogo $logo)
    {
        return view('admin.clients.logos.form', compact('logo'));
    }

    public function edit($id)
    {
        $logo = $this->logo->findOrFail($id);

        return view('admin.clients.logos.form', compact('logo'));
    }

    public function update(UpdateClientlogosRequest $request, $id)
    {
        $logo = $this->logo->findOrfail($id);

        $logo->fill($request->only('title', 'url'));

        if($request->hasFile('logo')){

            $filename = $this->uploadImage($request->file('logo'));

            if (\File::exists(public_path() . $logo->logo)) {
                 \File::delete(public_path() . $logo->logo);
             }

            $logo->logo = '/uploads/logos/' . $filename;
        }

        $logo->save();

        flash()->success(trans('flash.success'),trans('flash.logos.lupdated'));

        return redirect(route('admin.clientlogos.index'));

    }

    public function store(StoreClientlogosRequest $request)
    {
        if($request->hasFile('logo')){

            $filename = $this->uploadImage($request->file('logo'));

            $this->logo->create(
                ['logo' => '/uploads/logos/' . $filename] +
                $request->only('title', 'url')
            );

        }else{
            $this->logo->create($request->only('title', 'url'));
        }

        flash()->success(trans('flash.success'),trans('flash.logos.lcreated'));

        return redirect(route('admin.clientlogos.index'));
    }

    public function uploadImage($imageFile)
    {
        $filename = time() . '.' . $imageFile->getClientOriginalExtension();

        Image::make($imageFile)->resize(400, 300, function ($constraint) {
            $constraint->aspectRatio();
        })->resizeCanvas(400, 300)->save( public_path('/uploads/logos/' . $filename ) );

        return $filename;
    }

    public function imageDelete(Request $request){

        if($request->ajax()){
             $logo = $this->logo->findOrFail($request->get('logo_id'));

             if (\File::exists(public_path() . $logo->logo)) {
                 \File::delete(public_path() . $logo->logo);
                 $logo->logo = null;
                 $logo->save();
             }
             return response('{}', 200);
        }

    }

    public function destroy($id)
    {
        $logo = $this->logo->findOrFail($id);

         if (\File::exists(public_path() . $logo->avatar)) {
             \File::delete(public_path() . $logo->avatar);
         }

        $logo->delete();

        flash()->overlay(trans('flash.success'),trans('flash.logos.ldeleted'));

        return redirect(route('admin.clientlogos.index'));
    }

}
