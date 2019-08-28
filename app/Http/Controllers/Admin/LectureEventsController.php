<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLectureEventRequest;
use App\Http\Requests\UpdateLectureEventRequest;
use App\LectureEvent;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Yajra\Datatables\Facades\Datatables;

class LectureEventsController extends Controller
{
    protected $lectureevents;

    public function __construct(LectureEvent $lectureevents)
    {
        $this->lectureevents = $lectureevents;

        parent::__construct();
    }

    public function index()
    {
        return view('admin.lectureevents.index');
    }

    public function lectureeventsData()
    {
        $lectureevents = $this->lectureevents->latest();

        return Datatables::of($lectureevents)
            ->addColumn('action', function($lectureevents) {
                return view('admin.lectureevents.action', compact('lectureevents'))->render();
            })
            ->addColumn('action0', function($lectureevents) {
                return view('admin.lectureevents.action0', compact('lectureevents'))->render();
            })
//            ->addColumn('action1', function($lectureevents) {
//                return view('admin.lectureevents.action1', compact('lectureevents'))->render();
//            })
            ->editColumn('id', 'ID: {{$id}}')
            ->rawColumns(['action','action0', 'action1'])
            ->make(true);

    }

    public function updateActive(Request $request, $id){
        if($request->ajax()){
           $lectureevents = $this->lectureevents->findOrFail($id);
            if($request->get('active')){
                $lectureevents->active = $request->get('active') == 'true';
            }
            $lectureevents->save();

            return response()->json(['statut' => 'ok']);
        }
    }

    public function update(UpdateLectureEventRequest $request, $id)
	{

        $lectureevents = $this->lectureevents->findOrfail($id);

        $lectureevents->fill($request->only('title', 'theme', 'lecturers', 'active'));

        $lectureevents->save();

        flash()->overlay(trans('flash.success'),trans('flash.lectureevents.supdated'));

        return redirect(route('admin.lectureevents.index'));

	}

    public function create(LectureEvent $lectureevents)
    {
        return view('admin.lectureevents.form', compact('lectureevents'));
    }


    public function store(StoreLectureEventRequest $request){


        $lectureevents = $this->lectureevents->fill($request->only('title', 'theme', 'lecturers','active'));

        $lectureevents->save();

        flash()->overlay(trans('flash.success'),trans('flash.lectureevents.screated'));

        return redirect(route('admin.lectureevents.index'));
    }

    public function edit($id)
    {
        $lectureevents = $this->lectureevents->findOrFail($id);

        return view('admin.lectureevents.form', compact('lectureevents'));
    }


    public function destroy($id)
    {
//        try {
//            $this->lectureevents->findOrFail($id)->delete();
//        } catch (\Exception $e) {
//
//        }

        // flash()->overlay(trans('flash.success'),trans('flash.lectureevents.sdeleted'));

        return redirect(route('admin.lectureevents.index'));
    }


}
