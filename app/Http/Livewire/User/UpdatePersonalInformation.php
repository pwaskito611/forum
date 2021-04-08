<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;


class UpdatePersonalInformation extends Component
{
    public $name;
    public $description;
    public $success;

    protected $rules = [
        'name' => 'required|max:50',
        'description' => 'max:255',
    ];


    public function submit(Request $request) {
        $submit = User::find(\Auth::user()->id);
        $submit->name = str_replace('"', "''", $this->name);
        $submit->description = $this->description;
        $submit->save();

        $this->success = true;
    }

    public function mount () {
        $this->name = \Auth::user()->name;
        $this->description = \Auth::user()->description;
    }

    public function render()
    {
        return view('livewire.user.update-personal-information');
    }
}
 