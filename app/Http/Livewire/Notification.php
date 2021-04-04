<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Notification as Notif;

class Notification extends Component
{
    public $notif;
    public $isreaded;
    public $user;


    public function markAsRead() {
        $update = Notif::find($this->notif->id);
        $update->is_readed = 1;
        $update->save();

        return;
    }

    public function isReaded() {
        $check = Notif::find($this->notif->id);
        
        if($check->is_readed == 0) {
            return false;
        }

        return true;
    }

    public function mount() {
        if($this->notif->userNotification != null) {
            $this->user = User::find($this->notif->userNotification->user_id);
        }elseif($this->notif->threadNotification != null) {
            $this->user = User::find($this->notif->threadNotification->answerer_id);
        }

        $this->isreaded = $this->notif->is_readed;
    }

    public function render()
    {
        return view('livewire.notification', [
            'isReaded' => $this->isReaded()
        ]);
    }
}
