<?php

namespace App\Livewire\Auth;

use App\Models\Message;
use Livewire\Component;

class Dashboard extends Component
{
    public $id;
    public $newmessage;
    public $messages;

    public function mount(){
        $this->newmessage = Message::where('mailbox_id', $this->id)->where('destinataire_id',$this->id)->whereNull('read_at')->count();
        $this->messages = Message::where('mailbox_id', $this->id)->where('destinataire_id', $this->id)->latest()->limit(5)->get();
    }

    public function render()
    {
        return view('livewire.auth.dashboard');
    }
}
