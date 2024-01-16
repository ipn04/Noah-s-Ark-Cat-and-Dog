<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\ScheduleInterview;
use App\Models\Application;
use App\Models\Adoption;
use App\Models\VolunteerAnswers;
use Illuminate\Support\Facades\Redirect;

class InterviewController extends Controller
{
    public function store(Request $request)
    {

        $possible_characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $string_length = 30;

        function pickRandom($possible_characters, $string_length)
        {
            $random_string = substr(str_shuffle($possible_characters), 0, $string_length);
            return $random_string;
        }
        
        $random_string = pickRandom($possible_characters, $string_length);

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
        $scheduleInterview->room = $random_string;
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
    public function volunteerInterview(Request $request, $userId, $applicationId) 
    {
        try {
            // Find the latest application for the user
            $application = Application::where('user_id', $userId)
                ->latest('created_at') 
                ->firstOrFail();

            // Create a new schedule
            $schedule = new Schedule();
            $schedule->schedule_type = 'Interview'; 
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

    public function jitsiadmininterview(Request $request, $scheduleId){
        $result = ScheduleInterview::select(
            'schedule_interviews.interview_id as interview_id',
            'schedule_interviews.room as room',
            // Add other columns as needed
        )
        ->leftJoin('application', 'schedule_interviews.application_id', '=', 'application.id')
        ->leftJoin('users', 'application.user_id', '=', 'users.id')
        ->where('schedule_interviews.interview_id', '=', $scheduleId)
        ->first(); // Use first() instead of get()
    

        return view('admin_contents.interview', ['result' => $result]);

    }

    public function jitsiuserinterview(Request $request, $scheduleId){
        $result = ScheduleInterview::select(
            'schedule_interviews.interview_id as interview_id',
            'schedule_interviews.room as room',
            'users.name as lastname',
            'users.firstname as firstname'
        )
        ->leftJoin('application', 'schedule_interviews.application_id', '=', 'application.id')
        ->leftJoin('users', 'application.user_id', '=', 'users.id')
        ->where('schedule_interviews.interview_id', '=', $scheduleId)
        ->first(); 
    

        return view('user_contents.interview', ['result' => $result]);

    }
}
