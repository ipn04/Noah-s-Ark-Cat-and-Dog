<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PetDataController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\adoptionController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\PickupController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\RegisteredUserController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('ivan');

/* user`s routes */

Route::get('/user/dashboard', [PetDataController::class, 'showUserPets'])
    ->middleware(['auth', 'verified'])
    ->name('user.dashboard');


Route::post('/send/volunteer_form', [VolunteerController::class, 'store'])->name('volunteer.form');


// Route::get('/user/messages', function () {
//     return view('user_contents.messages');
// })->middleware(['auth', 'verified'])->name('user.messages');   

Route::post('/schedule/interview', [InterviewController::class, 'store'])->name('schedule.interview');

Route::post('/schedule/pickup', [PickupController::class, 'store'])->name('schedule.pickup');

Route::post('/schedule/visit', [VisitController::class, 'store'])->name('schedule.visit');

Route::get('/user/messages', [MessageController::class, 'displayMessage'])
    ->middleware(['auth', 'verified'])
->name('user.messages');

// Route::get('/inbox/messages', function () {
//     return view('user_contents.inbox_message.inbox');
// })->name('view.messages');

// show message in the inbox
Route::get('/inbox/messages', [MessageController::class, 'showSentMessages'])->middleware(['auth', 'verified'])->name('view.messages');

// reply message in the inbox
Route::post('/messages/reply', [MessageController::class, 'replyToMessage'])->name('messages.reply');

Route::get('/user/progress/{petId}', [AdoptionController::class, 'adoptionProgress'])
    ->middleware(['auth', 'verified'])
    ->name('user.adoptionprogress');


Route::get('/user/applications', [adoptionController::class, 'userApplication'])->middleware(['auth', 'verified'])->name('user.applications');   

Route::get('/user/pets/{petId}', [adoptionController::class, 'adoptPet'])->middleware(['auth', 'verified'])->name('user.pet');

Route::post('/send/form/{petId}', [adoptionController::class, 'store'])->name('send.form');

Route::get('/user/sendAdoption/{petId}', [PetDataController::class, 'sendAdoption'])->middleware(['auth', 'verified'])->name('user.adoption');

// Route::get('/user/adoption_form', function () {
//     return view('user_contents.adoptionform');
// })->middleware(['auth', 'verified'])->name('user.adoption');

Route::get('/user/volunteer_form', function () {
    return view('user_contents.volunteerform');
})->middleware(['auth', 'verified'])->name('user.volunteer');

// User send message 
Route::post('/send/messages', [MessageController::class, 'sendMessage'])->middleware(['auth', 'verified'])->name('messages.send');

/* admin`s routes */

Route::patch('/admin/update-stage/{id}', [adoptionController::class, 'updateStage'])->middleware(['auth', 'verified'])->name('admin.updateStage');

Route::patch('/admin/wrap-interview/{id}', [adoptionController::class, 'wrapInterview'])->middleware(['auth', 'verified'])->name('admin.wrap');

Route::patch('/admin/interview-stage/{id}', [adoptionController::class, 'interviewStage'])->middleware(['auth', 'verified'])->name('admin.interviewStage');

Route::patch('/admin/pickup-stage/{id}', [adoptionController::class, 'pickupStage'])->middleware(['auth', 'verified'])->name('admin.pickupStage');


Route::patch('/admin/update-contract/{id}', [adoptionController::class, 'updateContract'])->middleware(['auth', 'verified'])->name('update.contract');

Route::get('/download-contract/{id}', [AdoptionController::class, 'downloadContract'])->middleware(['auth', 'verified'])->name('download.contract');

Route::get('/view/registered/user', [ProfileController::class, 'showRegisteredUsers'])->middleware(['auth', 'verified'])->name('view.users');


// Route::get('/admin/volunteers', function () {
//     return view('admin_contents.volunteers');
// })->middleware(['auth', 'verified'])->name('admin.volunteers');

Route::get('/admin/volunteers', [VolunteerController::class, 'showVolunteer'])
    ->middleware(['auth', 'verified'])
    ->name('admin.volunteers');

Route::get('/admin/progress/{id}', [adoptionController::class, 'adminLoadProgress'])
    ->middleware(['auth', 'verified'])
    ->name('admin.adoptionprogress');

Route::get('/admin/dashboard', function () {
    return view('dashboards.admin_dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::get('/admin/messages', function () {
    return view('admin_contents.messages');
})->middleware(['auth', 'verified'])->name('admin.messages');

Route::get('/pet/management', [PetDataController::class, 'showPetManagement'])
    ->middleware(['auth', 'verified'])
    ->name('admin.pet.management');

Route::get('/admin/adoptions', [adoptionController::class, 'adminAdoptionProgress'])
    ->middleware(['auth', 'verified'])
    ->name('admin.adoptions');

Route::get('/admin/reports', function () {
    return view('admin_contents.reports');
})->middleware(['auth', 'verified'])->name('admin.reports');

// Route::get('/admin/adoptions', function () {
//     return view('admin_contents.adoptions');
// })->middleware(['auth', 'verified'])->name('admin.adoptions');


 Route::get('/user/volunteerprogress', function () {
     return view('user_contents.volunteer_progress');
})->middleware(['auth', 'verified'])->name('user.volunteerprogress');


// Route::get('/admin/schedule', function () {return view('admin_contents.schedule');})->middleware(['auth', 'verified'])->name('admin.schedule');

Route::get('/admin/schedule', [ScheduleController::class, 'view_schedule'])
    ->middleware(['auth', 'verified'])
    ->name('admin.schedule');

Route::get('/admin/profile/{id}', [ProfileController::class, 'adminProfile'])->name('admin.profile');

Route::get('/user/profile/{id}', [ProfileController::class, 'userProfile'])->name('user.profile');

Route::put('/user/update/{id}', [ProfileController::class, 'updateUserProfile'])->name('update.user');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/about', function () {
    return view('initial_page.aboutus');
})->name('about');



Route::get('/contact', function () {
    return view('initial_page.contact');
})->name('contact');

// Route::get('/pets', function () {
//     return view('initial_page.pets');
// })->name('pets');

Route::get('/pets', [PetDataController::class, 'showPublicPets'])->name('pets');


Route::get('/howicanhelp', function () {
    return view('initial_page.how');
})->name('how');


// admin crud
Route::post('/addPet', [PetDataController::class, 'addPet'])->middleware(['auth', 'verified'])->name('addPet');

Route::get('/pets/{id}', [PetDataController::class, 'showPet'])->middleware(['auth', 'verified'])->name('showPet');

Route::put('/pets/{id}', [PetDataController::class, 'update'])->middleware(['auth', 'verified'])->name('pets.update');

Route::delete('/pets/{id}', [PetDataController::class, 'delete'])->middleware(['auth', 'verified'])->name('pets.delete');



// for search
// Route::post('/pet/search', [PetDataController::class, 'search'])->middleware(['auth', 'verified'])->name('search');

Route::get('/filter-pets', [PetDataController::class, 'filterPets'])->name('filter.pets');


Route::get('/contactdev', function () {
    return view('profile.developer');
})->name('admin.developer');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
