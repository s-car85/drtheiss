<?php

namespace App\Http\Controllers;

use App\Vaucer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class VaucersController extends Controller
{
    protected $vaucers;


    public function __construct(Vaucer $vaucers)
    {
        $this->vaucers = $vaucers;

    }

    public function index(Request $request)
    {
        $vaucers = $this->vaucers->whereActive(1)->latest()->paginate(8);

        if($request->ajax()){
            return [
                'vaucers' => view('front.vaucers.ajaxvaucers',  compact('vaucers', $vaucers))->render(),
                'next_page' => $vaucers->nextPageUrl()
            ];
        }

        return view('front.vaucers.index', compact('vaucers', $vaucers));
    }

    public function postDownload(Request $request)
    {
        if($request->ajax()) {
            $vaucer = $this->vaucers->where('slug', $request->get('slug'))->whereActive(1)->firstOrFail();
            $vaucer->vaucer_count++;
            $vaucer->save();

            return response(['file' => $vaucer->vaucer_image, 'url' => asset($vaucer->vaucer_image)], 200);
        }

    }

    public function show($slug)
    {
        $vaucer = $this->vaucers->where('slug', $slug)->whereActive(1)->firstOrFail();

        return view('front.vaucers.show', compact('vaucer', $vaucer));
    }
}
