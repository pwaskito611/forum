<?php

namespace App\Http\Livewire\Thread;

use Livewire\Component;
use App\Models\Thread;

class Followed extends Component
{ 
    public $followed = [];

    public function mount() {
       if(\Auth::check()) {
            $this->followed = Thread::join('following_threads',
            'following_threads.thread_id', '=', 'threads.id')
            ->select('threads.id', 'threads.title')
            ->where('following_threads.user_id', \Auth::user()->id)
            ->take(10)
            ->get();
       }
    }

    public function render()
    {
        return view('livewire.thread.followed');
    }
}
