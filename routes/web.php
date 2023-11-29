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
});

Route::get('/pet/page', function () {
    return view('welcome.pet_page');
})->name('display.pet');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/addPet', [PetDataController::class, 'addPet'])->middleware(['auth', 'verified'])->name('addPet');

Route::get('/pets/{id}', [PetDataController::class, 'showPet'])->middleware(['auth', 'verified'])->name('showPet');

Route::delete('/pets/{id}', [PetDataController::class, 'delete'])->middleware(['auth', 'verified'])->name('pets.delete');

Route::get('/pet/management', [PetDataController::class, 'showPetManagement'])
    ->middleware(['auth', 'verified'])
    ->name('admin.pet.management');

Route::get('/user/dashboard', function () {
    return view('dashboards.user_dashboard');
})->middleware(['auth', 'verified'])->name('user.dashboard');   

Route::get('/admin/dashboard', function () {
    return view('dashboards.admin_dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
