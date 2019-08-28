<?php

namespace App\Http\Controllers\Admin;

use App\Lecture;
use App\Http\Controllers\Controller;
use App\LectureEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Facades\Datatables;

class LectureController extends Controller
{
    protected $lectures, $lecturesevents;

    public function __construct(Lecture $lectures, LectureEvent $lecturesevents)
    {
        $this->lectures = $lectures;
        $this->lecturesevents = $lecturesevents;

        parent::__construct();
    }

    public function index()
    {
        //$lecture = $this->lectures->with('lectureEvents')->unarchived()->get();

        return view('admin.lectures.index');
    }

    public function archive()
    {
        return view('admin.lectures.archive');
    }

    public function lecturesData()
    {
        $lecture = $this->lectures->with('lectureEvents')->unarchived()->get();

        return $this->getLecturesDatatables($lecture);
    }
    public function lecturesArchivedData()
    {
        $lecture = $this->lectures->with('lectureEvents')->archived()->get();

        return $this->getLecturesDatatables($lecture);
    }

    public function update(Request $request, $id)
	{

        $lecture = $this->lectures->findOrFail($id);
        if($request->get('seen')){
            $lecture->seen = $request->get('seen') == 'true';
        }elseif($request->get('archived')){
            $lecture->archived = $request->get('archived') == 'true';
        }
        $lecture->save();

        return response()->json(['statut' => 'ok']);
	}

    public function archiveAll()
    {
        DB::table('lectures')->where('archived', '=', 0)->update(array('archived' => 1));

        flash()->overlay(trans('flash.success'),trans('flash.lectures.sarchived'));

        return redirect(route('admin.lectures.index'));
    }


    public function destroy($id)
    {
        $lecture = $this->lectures->findOrFail($id);

        $lecture->delete();

        flash()->overlay(trans('flash.success'),trans('flash.lectures.sdeleted'));

        return redirect(route('admin.lectures.index'));
    }

    /**
     * @param $lecture
     * @return mixed
     */
    protected function getLecturesDatatables($lecture)
    {
        return Datatables::of($lecture)
            ->addColumn('action', function ($lectures) {
                return view('admin.lectures.action', compact('lectures'))->render();
            })
            ->addColumn('action2', function ($lectures) {
                return view('admin.lectures.action2', compact('lectures'))->render();
            })
            ->addColumn('action1', function ($lectures) {
                return view('admin.lectures.action1', compact('lectures'))->render();
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->rawColumns(['action', 'action2', 'action1'])
            ->make(true);
    }

}
