<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Message;
use App\Models\MessageThread;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('sidebars.admin_sidebar', function ($view) {
            $user = auth()->user();
    
            if ($user && $user->isAdmin()) {
                $unreadMessageThreadCount = MessageThread::unreadCount($user->id);
                $unreadMessageCount = Message::unreadCount($user->id);
                $totalUnreadCount = $unreadMessageThreadCount + $unreadMessageCount;
                $view->with('unreadMessageThreadCount', $unreadMessageThreadCount);
                $view->with('unreadMessageCount', $unreadMessageCount);
                $view->with('totalUnreadCount', $totalUnreadCount);
            } else {
                $view->with('unreadMessageThreadCount', 0);
                $view->with('unreadMessageCount', 0);
                $view->with('totalUnreadCount', 0);
            }
        });
    
        View::composer('sidebars.user_sidebar', function ($view) {
            $user = auth()->user();
    
            if ($user && !$user->isAdmin()) {
                $unreadMessageThreadCount = MessageThread::unreadCount($user->id);
                $unreadMessageCount = Message::unreadCount($user->id);
                $totalUnreadCount = $unreadMessageThreadCount + $unreadMessageCount;
                $view->with('unreadMessageThreadCount', $unreadMessageThreadCount);
                $view->with('unreadMessageCount', $unreadMessageCount);
                $view->with('totalUnreadCount', $totalUnreadCount);
            } else {
                $view->with('unreadMessageThreadCount', 0);
                $view->with('unreadMessageCount', 0);
                $view->with('totalUnreadCount', 0);
            }
        });
    }
}
