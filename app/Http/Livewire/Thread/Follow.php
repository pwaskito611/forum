<?php

namespace App\Http\Livewire\Thread;

use Livewire\Component;
use App\Models\ThreadFollower;

class Follow extends Component
{
    public $threadID;
    
    public function isFollowed() {
       $check = null;

       if(\Auth::check()) {
            $check = ThreadFollower::where('user_id', \Auth::user()->id)
            ->where('thread_id', $this->threadID)
            ->first();
       }

        if($check !== null) {
            return true;
        }

        return false;
    } 

    public function follow() {
        if(!\Auth::check()) {
            return \redirect('login');
        }

        if(!$this->isFollowed()) {
            $follow = new ThreadFollower;
            $follow->user_id = \Auth::user()->id;
            $follow->thread_id = $this->threadID;
            $follow->save();

            return;
        }

        ThreadFollower::where('user_id', \Auth::user()->id)
        ->where('thread_id', $this->threadID)
        ->delete();
    }

    public function render()
    {
        return view('livewire.thread.follow', [
            'isFollowed' => $this->isFollowed()
        ]);
    }
}
