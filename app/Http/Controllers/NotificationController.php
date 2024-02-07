<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifications;

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
}
