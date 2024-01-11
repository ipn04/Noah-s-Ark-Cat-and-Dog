<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\ScheduleInterview;
use App\Models\Application;
use App\Models\Adoption;


class InterviewController extends Controller
{
    public function store(Request $request)
    {
        $currentUserId = auth()->user()->id; // Change this to your actual way of getting the user ID

        $application = Application::where('user_id', $currentUserId)
        ->latest('created_at') // Order by created_at in descending order
        ->first();


        // Create a new schedule
        $schedule = new Schedule();
        $schedule->schedule_type = 'Interview'; // Default value
        $schedule->schedule_status = 'Pending'; // Default value
        $schedule->save();
 
        $schedID = $schedule->id;
        
        $scheduleInterview = new ScheduleInterview();
        $scheduleInterview->schedule_id = $schedID;
        $scheduleInterview->application_id = $application->id;
        $scheduleInterview->date = $request->input('date');
        $scheduleInterview->time = $request->input('time');
        $scheduleInterview->save();

        // Find the most recent adoption for the current user
        $adoption = Adoption::whereHas('application', function ($query) use ($currentUserId) {
            $query->where('user_id', $currentUserId);
        })->latest('created_at')->first();

        if ($adoption) {
            $adoption->stage += 1; // Increment 'stage' field
            $adoption->save();
        }
        return redirect()->back()->with(['send_schedule' => true]); 
    }
}
