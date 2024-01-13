<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Adoption;
use App\Models\Application;
use App\Models\AdoptionAnswer;
use App\Models\Pet;
use App\Models\ScheduleInterview;
use App\Models\Schedule;
use App\Models\SchedulePickup;
use App\Models\ScheduleVisit;
use App\Models\VolunteerApplication;
use App\Models\VolunteerAnswers;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

class adoptionController extends Controller
{
    public function store(Request $request, $petId)
    {
        $userId = auth()->user()->id; // Get the authenticated user's ID
        $pet = Pet::find($petId);
        // dd($petId);
        $application = new Application();
        $application->user_id = $userId; // Use the authenticated user's ID
        $application->application_type = "application_form";
        $application->save();

        $applicationId = $application->id;

        $adoption = new Adoption();
        $adoption->stage = 0;
        $adoption->pet_id = $petId; // Use the existing pet ID
        $adoption->application_id = $applicationId; // Set this to the application ID if applicable
        $adoption->save();

        $adoptionId = $adoption->id;
        
        $validatedData = $request->validate([
            'first_question' => 'required|string|max:255',
            'second_question' => 'required|string|max:255',
            'third_question' => 'required|string|max:255',
            'fourth_question' => 'required|string|max:255',
            'fifth_question' => 'required|string|max:255',
            'sixth_question' => 'required|string|max:255',
            'sevent_question' => 'required|string|max:255',
            'eight_question' => 'required|string|max:255',
            'ninth_question' => 'required|string|max:255',
            'tenth_question' => 'required|string|max:255',
            'eleventh_question' => 'required|string|max:255',
            'twelfth_question' => 'required|string|max:255',
            'thirteenth_question' => 'required|string|max:255',
            'fourteenth_question' => 'required|string|max:255',
            'fifteenth_question' => 'required|string|max:255',
            'seventeenth_question' => 'required|string|max:255',
            'eighteenth_question' => 'required|string|max:255',
            'nineteenth_question' => 'required|string|max:255',
            'twentieth_question' => 'required|string|max:255',
            'twentyfirst_question' => 'required|string|max:255',
            'twentysecond_question' => 'required|string|max:255',
            'twentythird_question' => 'required|string|max:255',
            'upload' => 'required',
            'upload2' => 'required',
        ],
        [
            'upload.required' => 'The pet image is required. Please, try again',
            'upload.image' => 'The file must be an image.',
            'upload.mimes' => 'Allowed image formats are: jpeg, png, jpg, gif.',
            'upload.max' => 'Maximum file size allowed is 2MB.',
            'upload2.required' => 'The pet image is required. Please, try again',
            'upload2.image' => 'The file must be an image.',
            'upload2.mimes' => 'Allowed image formats are: jpeg, png, jpg, gif.',
            'upload2.max' => 'Maximum file size allowed is 2MB.',
        ]
        );    
         
        if (!Storage::exists('public/signatures')) {
            Storage::makeDirectory('public/signatures');
        }
        
        if ($request->hasFile('upload')) {
            $image = $request->file('upload');
            $imageName = 'upload_' . time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
        
            $directory = 'signatures'; 
        
            $image->storeAs('public/' . $directory, $imageName);
        
            $validatedData['upload'] = $imageName;
        }
        
        if ($request->hasFile('upload2')) {
            $image2 = $request->file('upload2');
            $imageName2 = 'upload2_' . time() . '_' . Str::random(10) . '.' . $image2->getClientOriginalExtension();
        
            $directory2 = 'signatures'; 
        
            $image2->storeAs('public/' . $directory2, $imageName2);
        
            $validatedData['upload2'] = $imageName2;
        }
        

        try {
            $adoptionAnswer = new AdoptionAnswer();
            $adoptionAnswer->adoption_id = $adoptionId;
            $adoptionAnswer->fill($validatedData);
            $adoptionAnswer->save(); 
        } catch (\Exception $e) {
            // Log the error or use dd($e) to dump the error and investigate
            dd($e);
        }

        return redirect()->route('user.adoptionprogress', ['adoption_answer' => true, 'petId' => $petId, 'applicationId' => $applicationId]);
    } 
    public function adoptionProgress($petId, $applicationId, $adoptionAnswer = false)
    {
        $userId = auth()->user()->id;

        $adoptionAnswerData = AdoptionAnswer::whereHas('adoption', function ($query) use ($userId, $petId) {
            $query->whereHas('application', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })->where('pet_id', $petId);
        })->with('adoption.pet')->first();

        $stage = null;
        $adoption = null; 
        $petData = null;
        $scheduleInterview = null; 

        if ($adoptionAnswerData && $adoptionAnswerData->adoption) {
            $stage = $adoptionAnswerData->adoption->stage;
            $petData = $adoptionAnswerData->adoption->pet;
            $adoption = $adoptionAnswerData->adoption;
            $userr = $adoptionAnswerData->adoption->application->user;
            // dd($userr);
            $scheduleInterview = SchedulePickup::where('application_id', $adoptionAnswerData->adoption->application_id)
            ->with('schedule', 'application')
            ->first();
        }

        // Pass the pet data and other necessary variables to the view
        return view('user_contents.adoptionprogress', [
            'adoption_answer' => $adoptionAnswer, 
            'petData' => $petData, 'stage' => $stage, 'userr' => $userr, 'adoption' => $adoption, 'scheduleInterview' => $scheduleInterview
        ]);
    }
    public function adminAdoptionProgress($adoptionAnswer = false) {
        $adoptionAnswerData = AdoptionAnswer::with('adoption')->get();
        $adoptionCount = AdoptionAnswer::count();
        $pendingStages = ['0', '1', '2', '3', '4', '5', '6', '7', '8'];

        $pendingAdoptionAnswerData = $adoptionAnswerData->filter(function ($adoptionAnswer) use ($pendingStages) {
            return in_array($adoptionAnswer->adoption->stage, $pendingStages);
        });

        $adoptionCountPending = $pendingAdoptionAnswerData->count();

        $approvedAdoptionAnswers = $adoptionAnswerData->where('adoption.stage', '9')->count();

        $rejectedAdoptionAnswers = $adoptionAnswerData->where('adoption.stage', '10')->count();

        $adoptionAnswerData = AdoptionAnswer::with('adoption')->get();

        return view('admin_contents.adoptions', compact('adoptionAnswerData', 'adoptionCount', 'adoptionCountPending', 'approvedAdoptionAnswers', 'rejectedAdoptionAnswers'));
    }   

    public function adminLoadProgress($userId, $id) {
        $adoptionAnswer = Application::where('user_id', $userId)->findOrFail($id);

        // Find the specific adoption for the application
        $adoption = Adoption::where('application_id', $adoptionAnswer->id)->firstOrFail();
    
        $stage = $adoption->stage;
        $scheduleInterview = ScheduleInterview::with('schedule', 'application')
            ->where('application_id', $adoptionAnswer->id)
            ->first();

        $schedulePickup = SchedulePickup::with('schedule', 'application')
            ->where('application_id', $adoptionAnswer->id)
            ->first();

        // if (!$scheduleInterview && !$schedulePickup) {
        //     return redirect()->back()->with(['error' => 'Schedule not found']);
        // }

        return view('admin_contents.adoptionprogress', [
            'adoptionAnswer' => $adoptionAnswer,
            'stage' => $stage,
            'userId' => $userId,
            'scheduleInterview' => $scheduleInterview,
            'schedulePickup' => $schedulePickup,
            'adoption' => $adoption,
        ]);
    } 
    public function updateStage($userId, $id)
    {
        $adoptionAnswer = Adoption::join('application', 'adoption.application_id', '=', 'application.id')
            ->where('adoption.application_id', $id)
            ->where('application.user_id', $userId)
            ->first();

        if ($adoptionAnswer) {
            // Increment the stage directly
            DB::table('adoption')
            ->where('application_id', $id)
            ->update(['stage' => \DB::raw('stage + 1')]);

            return redirect()->back()->with(['updateStage' => true]);
        } else {
            return redirect()->back()->with(['error' => 'Application not found']);
        }
    }

    public function adoptPet($petId)
    {
        $pets = Pet::find($petId);
        if(!$pets) {
            return redirect()->back()->with('error', 'Pet not found');
        }

        $user = User::with(['adoption' => function ($query) {
            $query->orderByDesc('created_at')->first();
        }])->find(auth()->user()->id);
        
        $hasSubmittedForm = AdoptionAnswer::whereHas('adoption.application', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->exists();
        // dd($user->adoption ? $user->adoption->stage : null, $hasSubmittedForm);
        // dd($petId, $user->id, $hasSubmittedForm);
        return view('user_contents.petcontents', ['pets' => $pets, 'hasSubmittedForm' => $hasSubmittedForm, 'user' => $user]);
    }

    public function userApplication() {
        $userId = auth()->user()->id; // Assuming you're using authentication and want to fetch data for the currently logged-in user
        $totalApplicationsForUser = Application::where('user_id', $userId)->count();
        
        $answers = AdoptionAnswer::with('adoption')
            ->whereHas('adoption', function ($query) use ($userId) {
                $query->whereHas('application', function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                });
            })
            ->get();
            // dd($answers);
        $pendingApplicationForUser = $answers->filter(function ($adoptionAnswer) {
            $pendingStages = ['0', '1', '2', '3', '4', '5', '6', '7', '8'];
            return in_array($adoptionAnswer->adoption->stage, $pendingStages);
        });
    
        $totalPendingApplicationsForUser = $pendingApplicationForUser->count();
        $approvedApplicationForUser = $answers->where('adoption.stage', '9')->count();
        $rejectedApplicationForUser = $answers->where('adoption.stage', '10')->count();
        
        $volunteer = VolunteerAnswers::whereHas('volunteer_application.application', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->with('volunteer_application.application')->get();

        $pendingVolunteerApplicationForUser = $volunteer->filter(function ($adoptionAnswer) {
            $pendingStages = ['0', '1', '2', '3', '4', '5', '6', '7', '8'];
            return in_array($adoptionAnswer->volunteer_application->stage, $pendingStages);
        });

        $volunteerPending = $pendingVolunteerApplicationForUser->count();
        $volunteerApproved = $volunteer->where('volunteer_application.stage', '9')->count();
        return view('user_contents.applications', compact('answers', 'volunteer', 'totalApplicationsForUser', 'totalPendingApplicationsForUser', 'approvedApplicationForUser', 'rejectedApplicationForUser', 'volunteerPending', 'volunteerApproved'));
    }

    public function interviewStage($userId, $id)
    {
        $adoptionAnswer = Adoption::join('application', 'adoption.application_id', '=', 'application.id')
            ->where('adoption.application_id', $id)
            ->where('application.user_id', $userId)
            ->first();

        if ($adoptionAnswer) {
            DB::table('adoption')
                ->where('application_id', $id)
                ->update(['stage' => \DB::raw('stage + 1')]);

            $application = $adoptionAnswer->application;

            if ($application) {
                $scheduleInterview = ScheduleInterview::where('application_id', $application->id)->first();

                if ($scheduleInterview) { // Check if $scheduleInterview is not null
                    $schedule = $scheduleInterview->schedule;

                    if ($schedule) {
                        $schedule->update(['schedule_status' => 'Accepted']);
                    }
                } else {
                    // Handle the case when scheduleInterview is not found
                    // You might want to log or handle this situation appropriately
                }
            }

            return redirect()->back()->with(['updateStage' => true]);
        }

        // Handle the case when the record is not found
        return redirect()->back()->with(['updateStage' => false]);
    }

    

    public function pickupStage($userId, $id)
    {
        $adoptionAnswer = Adoption::join('application', 'adoption.application_id', '=', 'application.id')
        ->where('adoption.application_id', $id)
        ->where('application.user_id', $userId)
        ->first();

        if ($adoptionAnswer) {
            DB::table('adoption')
            ->where('application_id', $id)
            ->update(['stage' => \DB::raw('stage + 1')]);
            $application = $adoptionAnswer->application;
            if ($application) {
                $schedulepickup = SchedulePickup::where('application_id', $application->id)->first();
                if ($schedulepickup) {
                    $schedule = $schedulepickup->schedule;

                    if ($schedule) {
                        $schedule->update(['schedule_status' => 'Accepted']);
                    }
                }   
                return redirect()->back()->with(['updateStage' => true]); 
            }
        }
    }

    public function wrapInterview($userId, $id)
    {
        $adoptionAnswer = Adoption::join('application', 'adoption.application_id', '=', 'application.id')
            ->where('adoption.application_id', $id)
            ->where('application.user_id', $userId)
            ->first();

        if ($adoptionAnswer) {
            // Increment the stage directly
            DB::table('adoption')
            ->where('application_id', $id)
            ->update(['stage' => \DB::raw('stage + 1')]);

            return redirect()->back()->with(['updateStage' => true]);
        } else {
            return redirect()->back()->with(['error' => 'Application not found']);
        }
    }
    public function updateContract(Request $request, $userId, $id)
    {
        if (!Storage::exists('public/contracts')) {
            Storage::makeDirectory('public/contracts');
        }
    
        // Find the Adoption record directly
        $adoption = Adoption::join('application', 'adoption.application_id', '=', 'application.id')
            ->where('adoption.application_id', $id)
            ->where('application.user_id', $userId)
            ->first();
            
        if ($adoption) {
            // Using DB::table for direct update
            
            if ($request->hasFile('contract_file')) {
                $file = $request->file('contract_file');
                $filePath = $file->store('contracts', 'public');
                
                DB::table('adoption')
                ->where('application_id', $id)
                ->update([
                    'contract' => $filePath,
                    'stage' => DB::raw('`stage` + 1'), // Increment the stage directly
                ]);
                
                return redirect()->back()->with(['updateStage' => true]);
            }
    
            return redirect()->back()->with(['updateStage' => true]);
        }
    
        return redirect()->back()->with(['updateStage' => true]);
    }

    public function downloadContract($id)
    {
        $adoption = Adoption::find($id);

        if ($adoption && $adoption->contract) {
            $filePath = $adoption->contract;

            $userId = $adoption->application->user_id;

            if (auth()->user()->id === $userId) {
                $fileName = basename($filePath);

                if (Storage::disk('public')->exists($filePath)) {
                    return response()->download(storage_path("app/public/$filePath"), $fileName);
                }
            }
        }

        return redirect()->back()->with(['updateStage' => true, 'adoption' => $adoption]);
    }
}
