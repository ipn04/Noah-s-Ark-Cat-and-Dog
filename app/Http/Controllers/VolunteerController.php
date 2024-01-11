<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VolunteerApplication;
use App\Models\Application;
use App\Models\VolunteerAnswers;
use App\Models\User;

class VolunteerController extends Controller
{
    public function store(Request $request, $id)
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
    
        return redirect()->route('user.volunteerprogress', ['id' => $id])->with(['send_volunteer_form' => true]);
    }
    public function showVolunteer(Request $request)
    {
        $volunteer = VolunteerAnswers::all();

        return view('admin_contents.volunteers', ['volunteer' => $volunteer]);
    }
    public function UserVolunteerProgress(Request $request)
    {
        $user = auth()->user();

        $userVolunteerAnswers = VolunteerAnswers::whereHas('volunteer_application.application', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();
        // dd($userVolunteerAnswers);

        return view('user_contents.volunteer_progress', ['userVolunteerAnswers' => $userVolunteerAnswers, 'user' => $user->id]);
    }
    public function AdminVolunteerProgress(Request $request, $userId)
    {
        $userVolunteerAnswers = VolunteerAnswers::whereHas('volunteer_application.application.user', function ($query) use ($userId) {
            $query->where('id', $userId);
        })->get();
    
        return view('admin_contents.volunteer_progress', ['userVolunteerAnswers' => $userVolunteerAnswers, 'user' => $userId]);
    }
}
