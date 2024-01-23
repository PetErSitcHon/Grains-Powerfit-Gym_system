<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendanceController extends Controller
{

    public function records(){
        return view('attendance');
    }
    public function store(Request $request){
      

        $now = Carbon::now('GMT+8')->format('Y-m-d');

        return $this->attendances()->create([
            'day' => $now->format('Y-m-d'),
            'time_in' => $now->format('H:i:s')
        ]);
    }


  public function update()
    {
      

        $currentDate = Carbon::now('GMT+8')->format('H:i:s');
        
        Session::flash('success', 'Successfully Timed Out, See you tomorrow');
        return redirect()->back();
    }
}
