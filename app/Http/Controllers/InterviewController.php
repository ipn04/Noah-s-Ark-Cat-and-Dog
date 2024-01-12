<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\ScheduleInterview;
use App\Models\Application;
use App\Models\Adoption;
use App\Models\VolunteerAnswers;

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
    public function volunteerInterview(Request $request, $userId) 
    {
        try {
            // Find the latest application for the user
            $application = Application::where('user_id', $userId)
                ->latest('created_at') 
                ->firstOrFail();

            // Create a new schedule
            $schedule = new Schedule();
            $schedule->schedule_type = 'Volunteer Interview'; 
            $schedule->schedule_status = 'Pending'; 
            $schedule->save();

            // Create a new schedule interview
            $scheduleInterview = new ScheduleInterview();
            $scheduleInterview->schedule_id = $schedule->id;
            $scheduleInterview->application_id = $application->id;
            $scheduleInterview->date = $request->input('date');
            $scheduleInterview->time = $request->input('time');
            $scheduleInterview->save();

            // Find the volunteer answers for the user
            $userVolunteerAnswers = VolunteerAnswers::whereHas('volunteer_application.application.user', function ($query) use ($userId) {
                $query->where('id', $userId);
            })->first();

            // If answers are found, update the stage
            if ($userVolunteerAnswers) {
                $newStage = $userVolunteerAnswers->volunteer_application->stage + 1;

                $userVolunteerAnswers->volunteer_application->update(['stage' => $newStage]);
            }

            return redirect()->back()->with(['send_schedule' => true]);
        } catch (\Exception $e) {
            // Handle any exceptions that might occur
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
