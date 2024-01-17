<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VolunteerApplication;
use App\Models\Application;
use App\Models\VolunteerAnswers;
use App\Models\ScheduleInterview;
use App\Models\User;
use App\Models\SchedulePickup;
use App\Exports\VolunteersExport;
use Maatwebsite\Excel\Facades\Excel;

class VolunteerController extends Controller
{
    public function store(Request $request, $userId)
    {
        $currentUserId = auth()->user()->id;
    
        // Check for an existing application for the current user
        $existingApplication = VolunteerApplication::join('application', 'volunteer_application.application_id', '=', 'application.id')
            ->where('application.user_id', $currentUserId)
            ->whereNotIn('volunteer_application.stage', [10, 5])
            ->select('volunteer_application.*')
            ->first();
            
        if ($existingApplication) {
            // If an existing application is found, redirect back with a message
            return redirect()->back()->with(['already_submitted' => true]);
        }
    
        // Create the main application record
        $application = new Application();
        $application->user_id = $currentUserId;
        $application->application_type = 'application_volunteer';
        $application->save();
    
        // Create the VolunteerApplication record
        $volunteerApplication = new VolunteerApplication();
        $volunteerApplication->application_id = $application->id;
        $volunteerApplication->stage = 0;
        $volunteerApplication->save();
    
        $volunteerApplicationId = $volunteerApplication->id; // Use the correct property name
    
        // Store the answers
        $answers = $request->except('_token');
        $serializedAnswers = json_encode($answers);
    
        VolunteerAnswers::create([
            'volunteer_id' => $volunteerApplicationId,
            'answers' => $serializedAnswers
        ]);
    
        return redirect()->route('user.volunteerprogress', ['userId' => $userId, 'applicationId' => $application->id])->with(['send_volunteer_form' => true]);
    }
    
    public function showVolunteer(Request $request)
    {
        $volunteer = VolunteerAnswers::all();
        $volunteerCount = VolunteerApplication::count();
        $volunteerPendingCount = $volunteer->where('volunteer_application.stage', '>=', 0)
        ->where('volunteer_application.stage', '<=', 4)
        ->count();
        $volunteerApprovedCount = $volunteer->where('volunteer_application.stage', '==', 5)
        ->count();
        $volunteerRejectedCount = $volunteer->where('volunteer_application.stage', '==', 10)
        ->count();

        return view('admin_contents.volunteers', ['volunteer' => $volunteer, 'volunteerCount' => $volunteerCount, 'volunteerPendingCount' => $volunteerPendingCount, 'volunteerApprovedCount' => $volunteerApprovedCount, 'volunteerRejectedCount' => $volunteerRejectedCount]);
    }
    public function UserVolunteerProgress(Request $request, $userId, $applicationId)
    {
        $user = auth()->user();

        
        $userVolunteerAnswers = VolunteerAnswers::whereHas('volunteer_application.application', function ($query) use ($user, $userId, $applicationId) {
            $query->where('user_id', $userId)
                  ->where('application_id', $applicationId); 
        })->first();

        $scheduleInterview = ScheduleInterview::with('schedule', 'application')
    ->join('schedules', 'schedule_interviews.schedule_id', '=', 'schedules.id')
    ->join('application', 'schedule_interviews.application_id', '=', 'application.id')
    ->where('schedule_interviews.application_id', $userVolunteerAnswers->volunteer_application->application_id)
    ->where('application.user_id', $userId)
    ->where('schedules.schedule_status', 'Accepted') // Add this line for the additional condition
    ->select('schedule_interviews.*')
    ->first();

        // dd($userVolunteerAnswers);
        $stage = $userVolunteerAnswers->volunteer_application->stage;
        $answers = json_decode($userVolunteerAnswers->answers, true);

        return view('user_contents.volunteer_progress', ['scheduleInterview' => $scheduleInterview,'userVolunteerAnswers' => $userVolunteerAnswers, 'user' => $user->id, 'stage' => $stage, 'answers' => $answers]);
    }
    public function AdminVolunteerProgress(Request $request, $userId, $applicationId)
    {
         
        $userVolunteerAnswers = VolunteerAnswers::whereHas('volunteer_application.application', function ($query) use ( $userId, $applicationId) {
            $query->where('user_id', $userId)
                  ->where('application_id', $applicationId); 
        })->first();
        
        $scheduleInterview = ScheduleInterview::with('schedule', 'application')
        ->join('schedules', 'schedule_interviews.schedule_id', '=', 'schedules.id')
        ->join('application', 'schedule_interviews.application_id', '=', 'application.id')
        ->where('schedule_interviews.application_id', $userVolunteerAnswers->volunteer_application->application_id)
        ->where('application.user_id', $userId) 
        ->select('schedule_interviews.*')
        ->first();
    
        $acceptedSchedule = ScheduleInterview::with('schedule', 'application')
        ->join('schedules', 'schedule_interviews.schedule_id', '=', 'schedules.id')
        ->join('application', 'schedule_interviews.application_id', '=', 'application.id')
        ->where('schedule_interviews.application_id', $userVolunteerAnswers->volunteer_application->application_id)
        ->where('application.user_id', $userId)
        ->where('schedules.schedule_status', 'Accepted') // Add this line for the additional condition
        ->select('schedule_interviews.*')
        ->first();
        
        // dd($scheduleInterview);
        $stage = $userVolunteerAnswers->volunteer_application->stage;
        $answers = json_decode($userVolunteerAnswers->answers, true);
        return view('admin_contents.volunteer_progress', ['acceptedSchedule' => $acceptedSchedule, 'userVolunteerAnswers' => $userVolunteerAnswers, 'user' => $userId, 'stage' => $stage, 'answers' => $answers, 'scheduleInterview' => $scheduleInterview]);
    }
    public function updateVolunteerStage(Request $request, $userId)
    {
        $userVolunteerAnswers = VolunteerAnswers::whereHas('volunteer_application.application.user', function ($query) use ($userId) {
            $query->where('id', $userId);
        })->first();

        if ($userVolunteerAnswers) {
            $newStage = $userVolunteerAnswers->volunteer_application->stage + 1;

            $userVolunteerAnswers->volunteer_application->update(['stage' => $newStage]);
        }
        return redirect()->back()->with(['volunteer_progress' => true]);
    }
    
    public function volunteerReject($userId, $applicationId)
    {
        $userVolunteerAnswers = VolunteerAnswers::whereHas('volunteer_application.application.user', function ($query) use ($userId) {
            $query->where('id', $userId);
        })->first();

        if ($userVolunteerAnswers) {
            $volunteerApplication = $userVolunteerAnswers->volunteer_application;
    
            $volunteerApplication->update(['stage' => 10]);
        
            return redirect()->back()->with(['volunteer_progress' => true]);
        } else {
            return redirect()->back()->with('error', 'Volunteer application not found for the specified user.');
        }

        return redirect()->back()->with(['volunteer_progress' => true]);
    }
    public function volunteerInterviewReject($userId, $applicationId)
    {
        $userVolunteerAnswers = VolunteerAnswers::whereHas('volunteer_application.application.user', function ($query) use ($userId) {
            $query->where('id', $userId);
        })->first();
        
        if ($userVolunteerAnswers) {
            $volunteerApplication = $userVolunteerAnswers->volunteer_application;
 
            // Decrement the stage column by 1
            $volunteerApplication->decrement('stage', 1);

            if ($volunteerApplication) {
                $scheduleInterview = ScheduleInterview::where('application_id', $volunteerApplication->application_id)->first();
                if ($scheduleInterview) {
                    $schedule = $scheduleInterview->schedule;
                    
                    if ($schedule) {
                        $schedule->update(['schedule_status' => 'Rejected']);
                    }
                }   
                return redirect()->back()->with(['volunteer_progress' => true]); 
            }
        
            return redirect()->back()->with(['volunteer_progress' => true]);
        } else {
            return redirect()->back()->with('error', 'Volunteer application not found for the specified user.');
        }
    }
    public function export_volunteer()
    {
        return Excel::download(new VolunteersExport, 'Volunteers.xlsx');
    }
}
