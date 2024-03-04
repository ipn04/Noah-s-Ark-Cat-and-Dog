<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifications;
use App\Models\User;

class NotificationController extends Controller
{
    public function markAsRead(Request $request)
    {
        Notifications::whereNull('read_at')->update(['read_at' => now()]);

        return response()->json(['message' => 'All notifications marked as read'], 200);
    }

    public function notification() {
        
        $adminId = auth()->user()->id;
        $unreadNotificationsCount = Notifications::where('receiver_id', $adminId)
            ->whereNull('read_at')
            ->count();

        $adminNotifications = Notifications::where('receiver_id', $adminId)->orderByDesc('created_at')->take(5)->get();
        $adminAllNotifications = Notifications::where('receiver_id', $adminId)->orderByDesc('created_at')->get();

        return view('admin_contents.admin_notifications', ['unreadNotificationsCount' => $unreadNotificationsCount, 'adminNotifications' => $adminNotifications, 'adminAllNotifications' => $adminAllNotifications]);
    }

    public function updateMarkAsRead($notificationId)
    {
        $notification = Notifications::find($notificationId);

        if (!$notification) {
            return response()->json(['error' => 'Notification not found'], 404);
        }

        $notification->mark_as_read = now(); 
        $notification->save();

        return response()->json(['message' => 'Mark as read updated successfully'], 200);
    }

    public function ShowMorePage() {
        $authUser = auth()->user()->id;
        $adminId = User::where('role', 'admin')->value('id');;

        $unreadNotificationsCount = Notifications::where('receiver_id', $authUser)
            ->whereNull('read_at')
            ->count();

        $userNotifications = Notifications::where('receiver_id', $authUser)->orderByDesc('created_at')->take(5)->get();
        $userAllNotifications = Notifications::where('receiver_id', $authUser)->orderByDesc('created_at')->get();

        return view('user_contents.notifications', ['unreadNotificationsCount' => $unreadNotificationsCount, 'userNotifications' => $userNotifications, 'userAllNotifications' => $userAllNotifications]);
    }
    public function contact_developer() {
        $adminId = auth()->user()->id;
        $unreadNotificationsCount = Notifications::where('receiver_id', $adminId)
            ->whereNull('read_at')
            ->count();

        $adminNotifications = Notifications::where('receiver_id', $adminId)->orderByDesc('created_at')->take(5)->get();
        $adminAllNotifications = Notifications::where('receiver_id', $adminId)->orderByDesc('created_at')->get();

        return view('profile.developer', ['unreadNotificationsCount' => $unreadNotificationsCount, 'adminNotifications' => $adminNotifications, 'adminAllNotifications' => $adminAllNotifications]);
    }
}
