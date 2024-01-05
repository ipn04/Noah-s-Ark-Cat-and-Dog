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

        $application = Application::where('user_id', $currentUserId)->first();

        // Create a new schedule
        $schedule = new Schedule();
        $schedule->schedule_type = 'Interview'; // Default value
        $schedule->schedule_status = 'Pending'; // Default value
        $schedule->save();

        $scheduleInterview = new ScheduleInterview();
        $scheduleInterview->schedule_id = $schedule->id;
        $scheduleInterview->application_id = $application->id;
        $scheduleInterview->date = $request->input('date');
        $scheduleInterview->time = $request->input('time');
        $scheduleInterview->save();

        $adoption = Adoption::whereHas('application', function ($query) use ($currentUserId) {
            $query->where('user_id', $currentUserId);
        })->first();

        $adoption->stage += 1; // Update 'stage' field in the Adoption model
        $adoption->save();

        return redirect()->back()->with(['send_schedule' => true]); 
    }
}
