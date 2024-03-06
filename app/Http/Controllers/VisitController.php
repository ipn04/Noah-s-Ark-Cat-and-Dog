<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScheduleVisit;
use App\Models\Schedule;
use Illuminate\Support\Facades\Http;

class VisitController extends Controller
{
    //
    public function store(Request $request)
    {
    $currentUserId = auth()->user()->id; 
        $phoneNumber = auth()->user()->phone_number;
        $userName = auth()->user()->firstname;
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

        
        $parameters = array(
            'apikey' => env('SEMAPHORE_API_KEY'),
            'number' => $phoneNumber,
            'message' => "$userName sent a schedule visit in your shelter. Please Review!",
            'sendername' => ''
        );

        $response = Http::post('https://api.semaphore.co/api/v4/messages', $parameters);

        return redirect()->back()->with(['send_schedule' => true]); 
    }
    public function cancelSchedule($scheduleId)
    {
        $scheduleVisit = ScheduleVisit::findOrFail($scheduleId);

        $scheduleVisit->schedule->update(['schedule_status' => 'Canceled']);

        return redirect()->back()->with(['send_schedule' => true]); 
    }
}
