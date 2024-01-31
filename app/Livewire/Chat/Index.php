<?php

namespace App\Livewire\Chat;
use App\Models\Message;

use Livewire\Component;

class Index extends Component
{
    protected $layout = 'components.layouts.app';

    public $threads;
    public $initialMessage;

    public function mount()
    {
        $user = auth()->user();

        if ($user && $user->isAdmin()) {
            $this->threads = Message::all();
        } else {
            $this->threads = Message::where('sender_id', $user->id)->get();
        }
    }

    public function render()
    {
        return view('livewire.chat.index');
    }
}
