<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'firstname' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date'],
            'civil_status' => ['required', 'string', 'max:255'],
            'region' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'barangay' => ['required', 'string', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'regex:/^[0-9]+$/'],
            'profile_image' => ['required'],
        ],
            [
            'profile_image.required' => 'The profile image is required. Please, try again',
            'profile_image.image' => 'The file must be an image.',
            'profile_image.mimes' => 'Allowed image formats are: jpeg, png, jpg, gif.',
            'profile_image.max' => 'Maximum file size allowed is 2MB.',
            ]
        );
        $formattedBirthday = date("Y-m-d", strtotime($request->birthday));
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'user',
            'password' => Hash::make($request->password),
            'firstname' => $request->firstname,
            'gender' => $request->gender,
            'birthday' => $formattedBirthday,
            'civil_status' => $request->civil_status,
            'region' => $request->selected_region,
            'province' => $request->selected_province,
            'city' => $request->selected_city,
            'barangay' => $request->selected_barangay,
            'street' => $request->street,
            'phone_number' => $request->phone_number,
            'profile_image' => $request->profile_image,
        ]);
        
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Store the uploaded file in the storage directory
            $directory = 'profiles'; // Update this directory as needed

            $file->storeAs('public/'. $directory, $filename);

            $user->profile_image = $directory . '/' . $filename; // Correct path
            $user->save();
        }

        event(new Registered($user));

        return redirect()->route('register')->with(['account_added' => true]);
    }
}
