<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VolunteerApplication;
use App\Models\Application;
use App\Models\VolunteerAnswers;
use App\Models\ScheduleInterview;
use App\Models\User;

class VolunteerController extends Controller
{
    public function store(Request $request, $userId)
    {
        $currentUserId = auth()->user()->id;
    
        $existingApplication = VolunteerApplication::where('application_id', $currentUserId)->first();
    
        if ($existingApplication) {
            // If an existing application is found, redirect back with a message
            return redirect()->back()->with(['already_submitted' => true]);
        }
    
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
        
        $answers = $request->except('_token');
        $serializedAnswers = json_encode($answers);
    
        VolunteerAnswers::create([
            'volunteer_id' => $volunteerApplicationId,
            'answers' => $serializedAnswers
        ]);
    
        return redirect()->route('user.volunteerprogress', ['userId' => $userId])->with(['send_volunteer_form' => true]);
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
    public function UserVolunteerProgress(Request $request)
    {
        $user = auth()->user();

        $userVolunteerAnswers = VolunteerAnswers::whereHas('volunteer_application.application', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->first();
        // dd($userVolunteerAnswers);
        $stage = $userVolunteerAnswers->volunteer_application->stage;

        return view('user_contents.volunteer_progress', ['userVolunteerAnswers' => $userVolunteerAnswers, 'user' => $user->id, 'stage' => $stage]);
    }
    public function AdminVolunteerProgress(Request $request, $userId, $applicationId)
    {
        $userVolunteerAnswers = VolunteerAnswers::whereHas('volunteer_application.application.user', function ($query) use ($userId) {
            $query->where('id', $userId);
        })->first();
        
        $scheduleInterview = ScheduleInterview::with('schedule', 'application')
        ->where('application_id', $userVolunteerAnswers->volunteer_application->application_id)
        ->first();
        
        // dd($scheduleInterview);
        $stage = $userVolunteerAnswers->volunteer_application->stage;
        $answers = json_decode($userVolunteerAnswers->answers, true);
        return view('admin_contents.volunteer_progress', ['userVolunteerAnswers' => $userVolunteerAnswers, 'user' => $userId, 'stage' => $stage, 'answers' => $answers, 'scheduleInterview' => $scheduleInterview]);
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
    
}
