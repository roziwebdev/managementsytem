<?php

 
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Materialrequest;
use App\Models\Chat;

class ChatSidebar extends Component
{
    public $selectedMaterialRequestId;
    public $message;
    public $materialrequest_id;

    protected $listeners = ['openSidebar'];

    public function openSidebar($materialRequestId)
    {
        $this->selectedMaterialRequestId = $materialRequestId;
    }

    public function sendMessage()
    {
        // Simpan pesan chat ke dalam database
        Chat::create([
            'chat' => $this->chat,
            'materialrequest_id' => $this->materialrequest_id,
        ]);

        // Reset form setelah pesan dikirim
        $this->reset(['chat']);
    }

    public function render()
    {
        $materialRequest = Materialrequest::find($this->selectedMaterialRequestId);
        return view('livewire.chat-sidebar', ['materialRequest' => $materialRequest]);
    }
}
