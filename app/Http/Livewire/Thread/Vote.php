<?php

namespace App\Http\Livewire\Thread;

use Livewire\Component;
use App\Models\ThreadUpvote;
use App\Models\ThreadDownvote;

class Vote extends Component
{

    public $vote;
    public $thread;
    
    public function checkUpVote (){
       $check = null;

       if(\Auth::check()) {
            $check = ThreadUpvote::where('user_id', \Auth::user()->id)
            ->where('thread_id', $this->thread->id)
            ->first();
        }

        if($check == null) {
            return false;
        }

        return true;
    }

    public function checkDownVote (){
        $check = null;

        if(\Auth::check()) {
            $check = ThreadDownvote::where('user_id', \Auth::user()->id)
            ->where('thread_id', $this->thread->id)
            ->first();
        }

        if($check == null) {
            return false;
        }

        return true;
    }

    public function upVote() {
        if(!\Auth::check()) {
            return \redirect('login');
        }


        if(!$this->checkUpVote()) {
            $upVote = New ThreadUpVote;
            $upVote->user_id = \Auth::user()->id;
            $upVote->thread_id = $this->thread->id;
            $upVote->save();

            if($this->checkDownVote()){
                ThreadDownVote::where('user_id', \Auth::user()->id)
                ->where('thread_id', $this->thread->id)
                ->take(1)
                ->delete();
            
                $this->vote = $this->vote + 2;

                return;
            }

            $this->vote++;

            return;
        } 

        ThreadUpVote::where('user_id', \Auth::user()->id)
        ->where('thread_id', $this->thread->id)
        ->take(1)
        ->delete();

        $this->vote--;
    }

    public function downVote() {  
        if(!\Auth::check()) {
            return \redirect('login');
        }


        if(!$this->checkDownVote()) {
            $upVote = New ThreadDownVote;
            $upVote->user_id = \Auth::user()->id;
            $upVote->thread_id = $this->thread->id;
            $upVote->save();

            if($this->checkUpVote()){
                ThreadUpVote::where('user_id', \Auth::user()->id)
                ->where('thread_id', $this->thread->id)
                ->take(1)
                ->delete();
            
                $this->vote = $this->vote - 2;

                return;
            }

            $this->vote--;

            return;
        } 

        ThreadDownVote::where('user_id', \Auth::user()->id)
        ->where('thread_id', $this->thread->id)
        ->take(1)
        ->delete();

        $this->vote++;
    }

    public function render()
    {
        return view('livewire.thread.vote' ,[
            'upVoted' => $this->checkUpVote(),
            'downVoted' =>$this->checkDownVote()
        ]);
    }
}
