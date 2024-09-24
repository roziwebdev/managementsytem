<?php

namespace App\Livewire;

use App\Models\Materialrequest;
use Livewire\Component;

class Materialrequests extends Component
{
    public $materialrequests;
    public $newChat;
    public $selectedMr;



    public function mount()
    {
        $this->materialrequests = Materialrequest::all();
    }

    public function render()
    {
        return view('livewire.materialrequests');
    }

    public function selectMr($materialrequestId)
    {
        $this->selectedMr = Materialrequest::find($materialrequestId);
    }

    public function addChat()
    {
        $this->validate([
            'newChat' => 'required|string|max:255',
        ]);

        if ($this->selectedMr) {
            $this->selectedMr->chats()->create([
                'chat' => $this->newChat,
            ]);

            $this->newChat = '';
            $this->selectedMr = $this->selectedMr->fresh();
        }
    }
}
