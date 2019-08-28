<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Lecture;
use App\Mail\LectureMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LectureController extends Controller
{
    public function getStoreTime(){
        // Get hos for key
        $host = gethostname();
        // Using -1 for $last_update will always ensure that the next line is true if no entry exists
        $last_update = Session::has($host) ? Session::get($host) : -1;

        // If no entry exists (-1), then the below statement will always be true!
        $allow_entry = Carbon::now()->timestamp >=  $last_update ? true : false;

        return $allow_entry;

    }

    public function store(Request $request){

        $host = gethostname();

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'calling' => 'required|max:100',
            'licence' => 'required|max:100',
            'lecture' => 'required',
            'email' => 'required|email',
//            'g-recaptcha-response' => 'required|captcha'
        ]);


        if (!$validator->fails()) {
            if ($this->getStoreTime()) {

                $emails = ['prijava@drtheiss.rs', $request->get('email')];

                Mail::to($emails)->send(new LectureMail($request->all()));

                // Only update the Session if an entry was inserted
                Session::put($host, Carbon::now()->addMinute()->timestamp);

                foreach ($request->get('lecture') as $lecture_events_id){
                    $lecture = new Lecture();
                    $lecture->fill($request->only('name', 'email', 'calling', 'licence', 'foundation', 'phone'));
                    $lecture->lecture_events_id = $lecture_events_id;
                    $lecture->ip_adress = $request->getClientIp();
                    $lecture->save();
                }


                flash()->overlay('Hvala!', 'Uspešno ste se prijavli na predavanje.', 'success');

                return redirect()->back();
            }

             flash()->overlay('Upozorenje!', 'Prethodna prijava je već poslata, pokušajte ponovo kasnije. Hvala.', 'info');

            return redirect()->back()->withInput();
        }

         flash()->overlay('Greška!', implode('', $validator->errors()->all('<p>:message</p>')), 'error');

        return redirect()->back()->withInput();
    }
}
