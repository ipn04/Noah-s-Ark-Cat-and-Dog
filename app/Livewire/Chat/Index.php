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
        $this->threads = Message::all();
    }

    public function render()
    {
        return view('livewire.chat.index');
    }
}
