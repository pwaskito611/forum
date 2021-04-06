<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;

class UpdatePhotoProfile extends Component
{  
    use WithFileUploads;

    public $photoPath;
    public $image;
    public $success;


    public function updated() {
        if($this->image != "") {
            $this->validate([
                'image' => 'image',
            ]);
                
            $store = $this->image->store('public/asset');
            $this->photoPath = 'storage/' . substr($store, 7);   
        }
    }

    public function updatePhotoProfil() {
        $update = User::find(\Auth::user()->id);
        $update->photo_path = $this->photoPath;
        $update->save(); 
        
        $this->success = true;
    }

    public function mount() {
        if(\Auth::user()->photo_path !== null) {
            $this->photoPath = \Auth::user()->photo_path;
            return;
        }
            
        $this->photoPath = url('asset/man.svg');
    }

    public function render()
    {
        return view('livewire.user.update-photo-profile');
    }
}
