<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Notifications;
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
                
        $adminId = auth()->user()->id;
        $unreadNotificationsCount = Notifications::where('receiver_id', $adminId)
            ->whereNull('read_at')
            ->count();

        $adminNotifications = Notifications::where('receiver_id', $adminId)->orderByDesc('created_at')->take(5)->get();

        return view ("admin_contents.admin_profile", [
            'user' => $request->user(), 'unreadNotificationsCount' => $unreadNotificationsCount, 'adminNotifications' => $adminNotifications
        ]);
    }
    public function userProfile(Request $request, $id): View {     
        $users = User::find($id);
        $authUser = auth()->user()->id;
        $adminId = User::where('role', 'admin')->value('id');;

        $firstnotification = Notifications::where('receiver_id', $authUser)->where('sender_id', $adminId)->orderByDesc('created_at')->get();
        $unreadNotificationsCount = Notifications::where('receiver_id', $authUser)
            ->whereNull('read_at')
            ->count();

        $userNotifications = Notifications::where('receiver_id', $authUser)->orderByDesc('created_at')->take(5)->get();

        return view ("user_contents.user_profile", [
            'user' => $request->user(), 'firstnotification' => $firstnotification, 'unreadNotificationsCount' => $unreadNotificationsCount, 'userNotifications' => $userNotifications,
        ]);
    }

    public function showRegisteredUsers() {
        $showUsers = User::where('role', 'user')->paginate(10);

        $adminId = auth()->user()->id;
        $unreadNotificationsCount = Notifications::where('receiver_id', $adminId)
            ->whereNull('read_at')
            ->count();

        $adminNotifications = Notifications::where('receiver_id', $adminId)->orderByDesc('created_at')->take(5)->get();

        return view ('admin_contents.view_registered_users', compact('showUsers', 'unreadNotificationsCount', 'adminNotifications'));
    }

    public function updateUserProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // if ($request->has('birthday')) {
        //     $birthday = \DateTime::createFromFormat('d/m/Y', $request->input('birthday'));
        //     if ($birthday !== false) {
        //         $validatedData['birthday'] = $birthday->format('Y-m-d');
        //     }
        // }
        $validatedData = $request->validate([
            'name' => 'sometimes|required',
            'firstname' => 'sometimes|required',
            'gender' => 'sometimes|required',
            'civil_status' => 'sometimes|required',
        ]);

        $user->update($validatedData);
        return redirect()->route('user.profile', ['id' => $id])->with('profile_updated', true);
    }

    public function updatePassword(Request $request, $id) {
        $user = User::findOrFail($id);
        
        $validatePassword = $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        // dd($validatePassword);
        $user->update($validatePassword);
        return redirect()->route('user.profile', ['id' => $id])->with('profile_updated', true);
    }

    public function updateBirthday(Request $request, $id) {
        $user = User::findOrFail($id);
        
        $request->validate([
            'birthday' => 'required|date',
        ]);

        $formattedBirthday = date("Y-m-d", strtotime($request->birthday));
        $user->update(['birthday' => $formattedBirthday]);
        return redirect()->route('user.profile', ['id' => $id])->with('profile_updated', true);
    }

    public function updateAddress(Request $request, $id) {
        $user = User::findOrFail($id);
        
        $validatedData = $request->validate([
            'region' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'barangay' => ['required', 'string', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
        ]);

        $validatedData['region'] = $request->input('selected_region');
        $validatedData['province'] = $request->input('selected_province');
        $validatedData['city'] = $request->input('selected_city');
        $validatedData['barangay'] = $request->input('selected_barangay');

        // dd($validatedData);
        $user->update($validatedData);

        return redirect()->route('user.profile', ['id' => $id])->with('profile_updated', true);
    }

    public function updateProfileImage(Request $request, $id) {
        $user = User::findOrFail($id);
        
        $request->validate([
            'profile_image' => 'required'
        ]);

        if ($request->hasFile('profile_image')) {

            $image = $request->file('profile_image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
        
            $directory = 'profiles';
        
            $image->storeAs('public/' . $directory, $imageName);

            $user->profile_image = $directory . '/' . $imageName;
            $user->update();
        }

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
    public function deleteAccount(Request $request): RedirectResponse
    {
        $user=auth()->user();

        Auth::logout();

        $user->delete();

        return Redirect::to('/');
    }
}
