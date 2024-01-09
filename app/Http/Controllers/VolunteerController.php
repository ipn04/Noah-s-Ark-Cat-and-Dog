<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VolunteerApplication;
use App\Models\Application;
use App\Models\VolunteerAnswers;

class VolunteerController extends Controller
{
    public function store(Request $request)
    {
        $currentUserId = auth()->user()->id; // Change this to your actual way of getting the user ID
        $volApplication = Application::where('user_id', $currentUserId)->first();

        $volunteerApplication = new VolunteerApplication();
        $volunteerApplication->application_id = $volApplication->id; 
        $volunteerApplication->stage = '0'; 
        $volunteerApplication->save();

        $volunteerApplicationId = $volunteerApplication->volunteer_id;
        // dd($volunteerApplicationId);
        $answers = $request->except('_token');

        $serializedAnswers = json_encode($answers);

        VolunteerAnswers::create(['volunteer_id' => $volunteerApplicationId, 'answers' => $serializedAnswers]);

        return redirect()->back()->with(['send_volunteer_form' => true]); 
    }
    public function showVolunteer(Request $request)
    {
        $volunteer = VolunteerAnswers::all();

        return view('admin_contents.volunteers', ['volunteer' => $volunteer]);
    }
}
