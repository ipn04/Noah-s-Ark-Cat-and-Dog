<?php

namespace App\Livewire\Chat;
use App\Models\Message;
use App\Models\Notifications;

use Livewire\Component;

class Chat extends Component
{
    public $messageId;  
    public $selecte4dConversation;   
    public $unreadNotificationsCount;
    public $adminNotifications;

    public function mount($messageId)
    {
        $this->selecte4dConversation = Message::findOrFail($this->messageId);
        // dd($this->selecte4dConversation);
        $adminId = auth()->user()->id;
        $this->unreadNotificationsCount = Notifications::where('receiver_id', $adminId)
            ->whereNull('read_at')
            ->count();

        $this->adminNotifications = Notifications::where('receiver_id', $adminId)->orderByDesc('created_at')->take(5)->get();

    }

    public function render()
    {
        return view('livewire.chat.chat');
    }
}
