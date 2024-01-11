<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScheduleVisit;
use App\Models\Schedule;

class VisitController extends Controller
{
    //
    public function store(Request $request)
    {
    $currentUserId = auth()->user()->id; 
        // Create a new schedule
        $schedule = new Schedule();
        $schedule->schedule_type = 'Visit'; 
        $schedule->schedule_status = 'Pending'; 
        $schedule->save();
 
        $schedID = $schedule->id;
        
        $scheduleVisit = new ScheduleVisit();
        $scheduleVisit->schedule_id = $schedID;
        $scheduleVisit-> user_id = $currentUserId;
        $scheduleVisit->date = $request->input('date');
        $scheduleVisit->time = $request->input('time');
        $scheduleVisit->concern = $request->input('concern');
        $scheduleVisit->save();

        return redirect()->back()->with(['send_schedule' => true]); 
    }
}
