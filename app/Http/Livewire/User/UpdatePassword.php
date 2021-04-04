<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdatePassword extends Component
{

    public $password;
    public $rePassword;
    public $newPassword;

    protected $rules = [
        'password' => 'required',
        'newPassword' => 'min:8|required_with:rePassword|same:rePassword',
        'rePassword' => 'min:8'
    ];



    public function submit() {
        $this->validate();
    
        if(Hash::check($this->password, \Auth::user()->password)){
            $update = user::find(\Auth::user()->id);
            $update->password = Hash::make($this->newPassword);
            $update->save();

            $this->isSuccess = true;
            return;
        }
        $this->isSuccess = false;
    }

    public function render()
    {
        return view('livewire.user.update-password');
    }
}
  