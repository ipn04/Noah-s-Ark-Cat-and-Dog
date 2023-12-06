<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PetDataController;
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

Route::get('/user/dashboard', function () {
    return view('dashboards.user_dashboard');
})->middleware(['auth', 'verified'])->name('user.dashboard');   

Route::get('/user/messages', function () {
    return view('user_contents.messages');
})->middleware(['auth', 'verified'])->name('user.messages');   


Route::get('/user/applications', function () {
    return view('user_contents.applications');
})->middleware(['auth', 'verified'])->name('user.applications');   


/* admin`s routes */

Route::get('/admin/dashboard', function () {
    return view('dashboards.admin_dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::get('/admin/messages', function () {
    return view('admin_contents.messages');
})->middleware(['auth', 'verified'])->name('admin.messages');

Route::get('/pet/management', [PetDataController::class, 'showPetManagement'])
    ->middleware(['auth', 'verified'])
    ->name('admin.pet.management');

Route::get('/admin/reports', function () {
    return view('admin_contents.reports');
})->middleware(['auth', 'verified'])->name('admin.reports');

Route::get('/admin/adoptions', function () {
    return view('admin_contents.adoptions');
})->middleware(['auth', 'verified'])->name('admin.adoptions');

Route::get('/admin/volunteers', function () {
    return view('admin_contents.volunteers');
})->middleware(['auth', 'verified'])->name('admin.volunteers');

Route::get('/admin/schedule', function () {
    return view('admin_contents.schedule');
})->middleware(['auth', 'verified'])->name('admin.schedule');



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

Route::post('/addPet', [PetDataController::class, 'addPet'])->middleware(['auth', 'verified'])->name('addPet');

Route::get('/pets/{id}', [PetDataController::class, 'showPet'])->middleware(['auth', 'verified'])->name('showPet');

Route::delete('/pets/{id}', [PetDataController::class, 'delete'])->middleware(['auth', 'verified'])->name('pets.delete');

// for search
// Route::post('/pet/search', [PetDataController::class, 'search'])->middleware(['auth', 'verified'])->name('search');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
