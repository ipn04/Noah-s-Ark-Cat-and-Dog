<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules;
use Carbon\Carbon;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function adminProfile(Request $request, $id): View {      
        $users = User::find($id);
        
        return view ("admin_contents.admin_profile", [
            'user' => $request->user(),
        ]);
    }
    public function userProfile(Request $request, $id): View {     
        $users = User::find($id);
        
        return view ("user_contents.user_profile", [
            'user' => $request->user(),
        ]);
    }

    public function updateUserProfile(Request $request, $id)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'firstname' => 'sometimes|string|max:255',
            'gender' => 'sometimes|in:male,female,other',
            'civil_status' => 'sometimes|in:single,married,divorced,widowed',
            'region' => 'sometimes|string',
            'province' => 'sometimes|string',
            'city' => 'sometimes|string',
            'barangay' => 'sometimes|string',
            'street' => 'sometimes|string|max:255',
            'phone_number' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'profile_image' => 'nullable|image|max:2048', // Assuming profile images are uploaded
        ]);

        $user = User::findOrFail($id);

        if ($request->has('birthday')) {
            $birthday = \DateTime::createFromFormat('d/m/Y', $request->input('birthday'));
            if ($birthday !== false) {
                $validatedData['birthday'] = $birthday->format('Y-m-d');
            }
        }


        if ($request->hasFile('profiles')) {
            // Delete previous profile image if exists
            if ($user->profile_image) {
                Storage::delete('public/' . $user->profile_image);
            }

            $imagePath = $request->file('profiles')->store('public/profiles');
            $user->profile_image = str_replace('public/', '', $imagePath);
        }
  
        // Update password if provided
        if ($validatedData['password']) {
            $user->password = bcrypt($validatedData['password']);
        }

        unset($validatedData['password']);

        $user->fill($validatedData);
        $user->save();

        // Redirect to the profile page or wherever you need
        return redirect()->route('user.profile', ['id' => $id])->with('profile_updated', true);
    }

    

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
