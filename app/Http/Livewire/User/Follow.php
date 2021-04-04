<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use App\Models\PersonFollower;

class Follow extends Component
{
    public $userID;

    public function follow() {
        $follow = new PersonFollower;
        $follow->followed_id = $this->userID;
        $follow->follower_id = \Auth::user()->id;
        $follow->save();
    }

    public function unFollow() {
        PersonFollower::where('followed_id', $this->userID)
        ->where('follower_id', \Auth::user()->id)
        ->delete();
    }

    public function isFollowed() {
        $isFollowed = null;

        if(\Auth::check()) {
            $isFollowed = PersonFollower::where('follower_id', \Auth::user()->id)
            ->where('followed_id', $this->userID)
            ->first();
        }

        if($isFollowed !== null) {
            return true;
        }
        return false;
    }


    public function render()
    {
        return view('livewire.user.follow', [
            'isFollowed' => $this->isFollowed()
        ]);
    }
}
  