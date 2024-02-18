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
use App\Models\Notifications;
use App\Models\VolunteerApplication;
use App\Models\VolunteerAnswers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Exports\AdoptionsExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Str;

class adoptionController extends Controller
{
    public function store(Request $request, $petId)
    {
        $userId = auth()->user()->id; 
        $adminId = User::where('role', 'admin')->value('id');;
        $pet = Pet::find($petId);
        // dd($petId);
        $application = new Application();
        $application->user_id = $userId; 
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

            if (auth()->check()) {
                $user = auth()->user();      
            
                $notificationMessage = 'has submitted adoption application.';

                $notification = new Notifications();
                $notification->application_id = $applicationId;
                $notification->sender_id = $userId;
                $notification->receiver_id = $adminId; 
                $notification->concern = 'Adoption Application';
                $notification->message = $notificationMessage;
                $notification->save();

                // $adminNotifications = Notifications::where('receiver_id', $adminId)->orderByDesc('created_at')->get();
            } else {
                
            }
        } catch (\Exception $e) {
            // Log the error or use dd($e) to dump the error and investigate
            dd($e);
        }



        return redirect()->route('user.adoptionprogress', ['adoption_answer' => true, 'userId' => $userId, 'petId' => $petId, 'applicationId' => $applicationId, 'adoptionAnswer' => $adoptionAnswer]);
    } 
    public function adoptionProgress($userId, $applicationId, $adoptionAnswer = false)
    {
        $authUser = auth()->user()->id;
        $adminId = User::where('role', 'admin')->value('id');;

        $adoptionAnswerData = AdoptionAnswer::whereHas('adoption', function ($query) use ($userId) {
            $query->whereHas('application', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            });
        })->with('adoption.pet')
          ->latest()  // Fetch the latest adoption attempt
          ->first();
     
        $stage = null;
        $adoption = null; 
        $petData = null;
        $scheduleInterview = null; 
        $schedulePickup = null;
        $userr = null;

        if ($adoptionAnswerData && $adoptionAnswerData->adoption) {
            $stage = $adoptionAnswerData->adoption->stage;
            $petData = $adoptionAnswerData->adoption->pet;
            $adoption = $adoptionAnswerData->adoption;
            $userr = $adoptionAnswerData->adoption->application->user;
            // dd($userr);
            $scheduleInterview = SchedulePickup::where('application_id', $adoptionAnswerData->adoption->application_id)
            ->with('schedule', 'application')
            ->first();

            $schedulePickup = ScheduleInterview::where('application_id', $adoptionAnswerData->adoption->application_id)
            ->with('schedule', 'application')
            ->first();
        }

        // dd($stage);
        $firstnotification = Notifications::where('receiver_id', $authUser)->where('sender_id', $adminId)->where('application_id', $applicationId)->orderByDesc('created_at')->get();
        $unreadNotificationsCount = Notifications::where('receiver_id', $authUser)
            ->whereNull('read_at')
            ->count();

        $userNotifications = Notifications::where('receiver_id', $authUser)->orderByDesc('created_at')->take(5)->get();
        // dd($userId);
        // Pass the pet data and other necessary variables to the view
        return view('user_contents.adoptionprogress', ['firstnotification' => $firstnotification, 'unreadNotificationsCount' => $unreadNotificationsCount, 'userNotifications' => $userNotifications,
            'adoption_answer' => $adoptionAnswer, 
            'petData' => $petData, 'stage' => $stage, 'userr' => $userr, 'adoption' => $adoption, 'scheduleInterview' => $scheduleInterview, 'schedulePickup' => $schedulePickup, 'adoptionAnswerData' => $adoptionAnswerData
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

        $cancelledAdoptionAnswers = $adoptionAnswerData->where('adoption.stage', '11')->count();

        $adoptionAnswerData = AdoptionAnswer::with('adoption')->get();

        $adminId = auth()->user()->id;
        $unreadNotificationsCount = Notifications::where('receiver_id', $adminId)
            ->whereNull('read_at')
            ->count();

        $adminNotifications = Notifications::where('receiver_id', $adminId)->orderByDesc('created_at')->take(5)->get();


        return view('admin_contents.adoptions', compact('unreadNotificationsCount', 'adminNotifications', 'adoptionAnswerData', 'adoptionCount', 'adoptionCountPending', 'approvedAdoptionAnswers', 'rejectedAdoptionAnswers', 'cancelledAdoptionAnswers'));
    }   

    public function adminLoadProgress($userId, $id) {

        $adoptionAnswer = Application::where('user_id', $userId)->findOrFail($id);
        $adoption = Adoption::where('application_id', $adoptionAnswer->id)->firstOrFail();
        
        $adoptionAnswers = $adoption->adoptionAnswer;

        // dd($adoptionAnswers);
        $stage = $adoption->stage;

        $scheduleInterview = ScheduleInterview::with('schedule', 'application')
            ->where('application_id', $adoptionAnswer->id)
            ->latest()->first();
            // dd($scheduleInterview);

        // dd($scheduleInterview);

        $schedulePickup = SchedulePickup::with('schedule', 'application')
            ->where('application_id', $adoptionAnswer->id)
            ->latest()->first();

        // dd($schedulePickup);

        // if (!$scheduleInterview && !$schedulePickup) {
        //     return redirect()->back()->with(['error' => 'Schedule not found']);
        // }
        $adminId = auth()->user()->id;
        $unreadNotificationsCount = Notifications::where('receiver_id', $adminId)
            ->whereNull('read_at')
            ->count();

        $adminNotifications = Notifications::where('receiver_id', $adminId)->orderByDesc('created_at')->take(5)->get();
        $firstnotification = Notifications::where('receiver_id', $adminId)->where('sender_id', $userId)->where('application_id', $id)->orderByDesc('created_at')->get();
            
        return view('admin_contents.adoptionprogress', [
            'adoptionAnswer' => $adoptionAnswer,
            'stage' => $stage,
            'userId' => $userId,
            'scheduleInterview' => $scheduleInterview,
            'schedulePickup' => $schedulePickup,
            'adoption' => $adoption,
            'adoptionAnswers' => $adoptionAnswers,
            'unreadNotificationsCount' => $unreadNotificationsCount,
            'adminNotifications' => $adminNotifications,
            'firstnotification' => $firstnotification
        ]);
    } 
    public function updateStage($userId, $id)
    {
        $adoptionAnswer = Adoption::join('application', 'adoption.application_id', '=', 'application.id')
            ->where('adoption.application_id', $id)
            ->where('application.user_id', $userId)
            ->first();

        $adminId = auth()->id();
        if ($adoptionAnswer->stage == 0){
            $notificationMessage = 'Application Validated.';
        }
        elseif ($adoptionAnswer->stage == 4) {
            $notificationMessage = 'Application Accepted';
        }
        elseif ($adoptionAnswer->stage == 4) {
            $notificationMessage = 'Application Accepted';
        }
        elseif ($adoptionAnswer->stage == 8) {
            $notificationMessage = 'Success';
        }

        $notification = new Notifications();
        $notification->application_id = $id; 
        $notification->sender_id = $adminId;
        $notification->receiver_id = $userId; 
        $notification->concern = 'Adoption Application';
        $notification->message = $notificationMessage;
        $notification->save();
        
        // dd($notification);

        if ($adoptionAnswer) {
            // Increment the stage directly
            DB::table('adoption')
            ->where('application_id', $id)
            ->update(['stage' => \DB::raw('stage + 1')]);

            if ($adoptionAnswer->stage == 8) {
                DB::table('pets')
                    ->where('id', $adoptionAnswer->pet_id)
                    ->update(['adoption_status' => 'Adopted']);
            }

            return redirect()->back()->with(['updateStage' => true]);
        } else {
            return redirect()->back()->with(['error' => 'Application not found']);
        }
    }

    public function cancelStage(Request $request, $userId, $id)
    {
        // Assuming you want to update the stage to 11 in the Adoption model
        $adminId = User::where('role', 'admin')->value('id');

        $adoption = Adoption::where('application_id', $id)->firstOrFail();
        $adoption->update(['stage' => 11]);

        $notificationMessage = 'Cancelled application';
        
        $notification = new Notifications();
        $notification->application_id = $id; 
        $notification->sender_id = $userId;
        $notification->receiver_id = $adminId; 
        $notification->concern = 'Adoption Application';
        $notification->message = $notificationMessage;
        $notification->save();

        // You can add more logic or redirect as needed
        return redirect()->back()->with(['success' => 'Stage updated successfully']);
    }

    public function rejectStage($userId, $id)
    {   
        $adminId = auth()->id();
        $notificationMessage = 'Admin Rejected your Application';

        $notification = new Notifications();
        $notification->application_id = $id; 
        $notification->sender_id = $adminId;
        $notification->receiver_id = $userId; 
        $notification->concern = 'Adoption Application';
        $notification->message = $notificationMessage;
        $notification->save();
        
        $adoptionAnswer = Adoption::join('application', 'adoption.application_id', '=', 'application.id')
            ->where('adoption.application_id', $id)
            ->where('application.user_id', $userId)
            ->first();

        if ($adoptionAnswer) {
            // Increment the stage directly
            DB::table('adoption')
            ->where('application_id', $id)
            ->update(['stage' => 10]);

            return redirect()->back()->with(['updateStage' => true]);
        } else {
            return redirect()->back()->with(['error' => 'Application not found']);
        }
    }

    public function adoptPet($petId)
    {
        $authUser = auth()->user()->id;

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

        $unreadNotificationsCount = Notifications::where('receiver_id', $authUser)
            ->whereNull('read_at')
            ->count();

        $userNotifications = Notifications::where('receiver_id', $authUser)->orderByDesc('created_at')->take(5)->get();

        return view('user_contents.petcontents', ['pets' => $pets, 'hasSubmittedForm' => $hasSubmittedForm, 'user' => $user, 'unreadNotificationsCount' => $unreadNotificationsCount, 'userNotifications' => $userNotifications]);
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
        $interviewSchedules = ScheduleInterview::with('schedule')
            ->whereIn('application_id', $answers->pluck('adoption.application.id'))
            ->get();
    
        $visitSchedules = ScheduleVisit::with('schedule')
            ->whereIn('user_id', $answers->pluck('adoption.user.id'))
            ->get();
    
        $pickupSchedules = SchedulePickup::with('schedule')
            ->whereIn('application_id', $answers->pluck('adoption.application.id'))
            ->get();
    
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

        $schedules = Schedule::join('schedule_visit', 'schedules.id', '=', 'schedule_visit.schedule_id')
        ->where('schedule_visit.user_id', '=', $userId)
        ->orderBy('schedules.created_at', 'desc')
        ->get();


        $scheduleCount = $schedules->count();

        $volunteerPending = $pendingVolunteerApplicationForUser->count();
        $volunteerApproved = $volunteer->where('volunteer_application.stage', '9')->count();

        $unreadNotificationsCount = Notifications::where('receiver_id', $userId)
            ->whereNull('read_at')
            ->count();

        $userNotifications = Notifications::where('receiver_id', $userId)->orderByDesc('created_at')->take(5)->get();

        return view('user_contents.applications',  compact('unreadNotificationsCount', 'userNotifications', 'scheduleCount', 'schedules','answers', 'volunteer', 'totalApplicationsForUser', 'totalPendingApplicationsForUser', 'approvedApplicationForUser', 'rejectedApplicationForUser', 'volunteerPending', 'volunteerApproved', 'interviewSchedules', 'visitSchedules', 'pickupSchedules'));
    }

    public function interviewStage($userId, $id)
    {
        $adoptionAnswer = Adoption::join('application', 'adoption.application_id', '=', 'application.id')
            ->where('adoption.application_id', $id)
            ->where('application.user_id', $userId)
            ->first();

        $adminId = User::where('role', 'admin')->value('id');


        if ($adoptionAnswer) {
            DB::table('adoption')
                ->where('application_id', $id)
                ->update(['stage' => \DB::raw('stage + 1')]);

            $application = $adoptionAnswer->application;

            $notificationMessage = 'Admin has Accepted the Interview Schedule';

            $notification = new Notifications();
            $notification->application_id = $application->id; 
            $notification->sender_id = $adminId;
            $notification->receiver_id = $userId; 
            $notification->concern = 'Adoption Application';
            $notification->message = $notificationMessage;
            $notification->save();

            if ($application) {
                $scheduleInterview = ScheduleInterview::where('application_id', $application->id)->latest()->first();

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

    public function rejectInterview($userId, $id)
    {
        $adminId = User::where('role', 'admin')->value('id');

        $adoptionAnswer = Adoption::join('application', 'adoption.application_id', '=', 'application.id')
            ->where('adoption.application_id', $id)
            ->where('application.user_id', $userId)
            ->latest('adoption.created_at')
            ->first();

        if ($adoptionAnswer) {
            DB::table('adoption')
                ->where('application_id', $id)
                ->update(['stage' => \DB::raw('stage - 1')]);

            $application = $adoptionAnswer->application;
            
            $notificationMessage = 'Admin has rejected the Interview Schedule. Please, re-schedule the Interview';

            $notification = new Notifications();
            $notification->application_id = $application->id; 
            $notification->sender_id = $adminId;
            $notification->receiver_id = $userId; 
            $notification->concern = 'Adoption Application';
            $notification->message = $notificationMessage;
            $notification->save();

            if ($application) {
                $scheduleInterview = ScheduleInterview::where('application_id', $application->id)->latest()->first();

                if ($scheduleInterview) { // Check if $scheduleInterview is not null
                    $schedule = $scheduleInterview->schedule;

                    if ($schedule) {
                        $schedule->update(['schedule_status' => 'Rejected']);
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

    public function AdminCancelInterview($userId, $id)
    {
        $adminId = User::where('role', 'admin')->value('id');

        $adoptionAnswer = Adoption::join('application', 'adoption.application_id', '=', 'application.id')
            ->where('adoption.application_id', $id)
            ->where('application.user_id', $userId)
            ->latest('adoption.created_at')->first();

        if ($adoptionAnswer) {
            DB::table('adoption')
                ->where('application_id', $id)
                ->update(['stage' => \DB::raw('stage - 2')]);

            $application = $adoptionAnswer->application;

            $notificationMessage = 'Admin has cancelled the Interview Schedule. Please, re-schedule the Interview';

            $notification = new Notifications();
            $notification->application_id = $id; 
            $notification->sender_id = $adminId;
            $notification->receiver_id = $userId; 
            $notification->concern = 'Adoption Application';
            $notification->message = $notificationMessage;
            $notification->save();

            if ($application) {
                $scheduleInterview = ScheduleInterview::where('application_id', $application->id)->first();

                if ($scheduleInterview) { // Check if $scheduleInterview is not null
                    $schedule = $scheduleInterview->schedule;

                    if ($schedule) {
                        $schedule->update(['schedule_status' => 'Canceled']);
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

    public function UserCancelInterview($userId, $id)
    {
        $adoptionAnswer = Adoption::where('application_id', $id)->firstOrFail();
        $adminId = User::where('role', 'admin')->value('id');

        if ($adoptionAnswer) {
            DB::table('adoption')
                ->where('application_id', $id)
                ->update(['stage' => \DB::raw('stage - 2')]);

            $application = $adoptionAnswer->application;
            $notificationMessage = 'Cancelled the Interview';

            $notification = new Notifications();
            $notification->application_id = $id; 
            $notification->sender_id = $userId;
            $notification->receiver_id = $adminId; 
            $notification->concern = 'Adoption Application';
            $notification->message = $notificationMessage;
            $notification->save();
            
            if ($application) {
                $scheduleInterview = ScheduleInterview::where('application_id', $application->id)->first();

                if ($scheduleInterview) { // Check if $scheduleInterview is not null
                    $schedule = $scheduleInterview->schedule;

                    if ($schedule) {
                        $schedule->update(['schedule_status' => 'Canceled']);
                    }
                } else {
                    // Handle the case when scheduleInterview is not found
                    // You might want to log or handle this situation appropriately
                }
            }

            return redirect()->back()->with(['send_schedule' => true]);
        }
        return redirect()->back()->with(['send_schedule' => false]);
    }

    public function pickupStage($userId, $id)
    {
        $adoptionAnswer = Adoption::join('application', 'adoption.application_id', '=', 'application.id')
        ->where('adoption.application_id', $id)
        ->where('application.user_id', $userId)
        ->first();

        $adminId = User::where('role', 'admin')->value('id');

        if ($adoptionAnswer) {
            DB::table('adoption')
            ->where('application_id', $id)
            ->update(['stage' => \DB::raw('stage + 1')]);

            $application = $adoptionAnswer->application;
            
            $notificationMessage = 'Admin has Accepted the Pickup Schedule';

            $notification = new Notifications();
            $notification->application_id = $application->id; 
            $notification->sender_id = $adminId;
            $notification->receiver_id = $userId; 
            $notification->concern = 'Adoption Application';
            $notification->message = $notificationMessage;
            $notification->save();

            if ($application) {
                $schedulepickup = SchedulePickup::where('application_id', $application->id)->latest()->first();
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

    public function rejectPickup($userId, $id)
    {
        $adminId = User::where('role', 'admin')->value('id');

        $adoptionAnswer = Adoption::join('application', 'adoption.application_id', '=', 'application.id')
        ->where('adoption.application_id', $id)
        ->where('application.user_id', $userId)
        ->first();

        if ($adoptionAnswer) {
            DB::table('adoption')
            ->where('application_id', $id)
            ->update(['stage' => \DB::raw('stage - 1')]);

            $application = $adoptionAnswer->application;
            
            $notificationMessage = 'Admin has rejected the Pickup Schedule. Please, re-schedule';

            $notification = new Notifications();
            $notification->application_id = $id; 
            $notification->sender_id = $adminId;
            $notification->receiver_id = $userId; 
            $notification->concern = 'Adoption Application';
            $notification->message = $notificationMessage;
            $notification->save();

            if ($application) {
                $schedulepickup = SchedulePickup::where('application_id', $application->id)->first();
                if ($schedulepickup) {
                    $schedule = $schedulepickup->schedule;
                    
                    if ($schedule) {
                        $schedule->update(['schedule_status' => 'Rejected']);
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
            // dd($adoption);
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

            if ($userId === $userId) {
                $fileName = basename($filePath);
                // dd($fileName);

                if (Storage::disk('public')->exists($filePath)) {
                    return response()->download(storage_path("app/public/$filePath"), $fileName);
                }
            }
        }

        return redirect()->back()->with(['updateStage' => true, 'adoption' => $adoption]);
    }
    public function export_adoption()
    {
        return Excel::download(new AdoptionsExport, 'Adoption.xlsx');
    }
}
