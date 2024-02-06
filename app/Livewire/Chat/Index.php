<?php

namespace App\Livewire\Chat;
use App\Models\Message;
use App\Models\MessageThread;
use App\Models\Notifications;

use Livewire\Component;

class Index extends Component
{
    protected $layout = 'components.layouts.app';

    public $threads;
    public $initialMessage;
    public $unreadNotificationsCount;
    public $adminNotifications;

    public function mount()
    {
        $user = auth()->user();

        $adminId = auth()->user()->id;
        $this->unreadNotificationsCount = Notifications::where('receiver_id', $adminId)
            ->whereNull('read_at')
            ->count();

        $this->adminNotifications = Notifications::where('receiver_id', $adminId)->orderByDesc('created_at')->take(5)->get();

        if ($user && $user->isAdmin()) {
            $this->threads = Message::all();
        } else {
            $this->threads = Message::where('sender_id', $user->id)->get();
        }
        foreach ($this->threads as $thread) {
            $latestMessage = MessageThread::where('parent_message_id', $thread->id)
                ->orderBy('created_at', 'desc')
                ->first();

            // Update the thread's content with the latest message
            if ($latestMessage) {
                $thread->content = $latestMessage->content;
                $thread->created_at = $latestMessage->created_at;

                // Check if the latest message is from the authenticated user
                $thread->isCurrentUser = $latestMessage->sender_id === $user->id;
            } else {
                $thread->isCurrentUser = false;
            }

            $thread->unreadCount = MessageThread::where('parent_message_id', $thread->id)
                ->whereNull('read_at')
                ->where('receiver_id', $user->id)
                ->where('sender_id', '!=', $user->id)
                ->count();
        }
    }
    public function markAsReadAndNavigate($threadId)
    {
        $this->markAsRead($threadId);

        return redirect()->route('chat', ['messageId' => $threadId]);
    }

    public function markAsRead($threadId)
    {
        $user = auth()->user();

        if ($user && $user->isAdmin()) {
            MessageThread::where('parent_message_id', $threadId)
                ->whereNull('read_at')
                ->where('receiver_id', $user->id)
                ->update(['read_at' => now()]);

            $this->threads = Message::with('threads')->where('receiver_id', $user->id)->get();
        } else {
            MessageThread::where('parent_message_id', $threadId)
                ->whereNull('read_at')
                ->where('receiver_id', $user->id)
                ->update(['read_at' => now()]);

            $this->threads = Message::with('threads')->where('receiver_id', $user->id)->get();
        }
    }

    public function render()
    {
        return view('livewire.chat.index');
    }
}
