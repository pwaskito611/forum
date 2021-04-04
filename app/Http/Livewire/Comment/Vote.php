<?php

namespace App\Http\Livewire\Comment;

use Livewire\Component;
use App\Models\CommentsUpVote;
use App\Models\CommentsDownVote;

class Vote extends Component
{
    public $voted;
    public $commentID;

    public function isUpVoted() {
        $check = null;

        if (\Auth::check()) {
            $check = CommentsUpVote::where('comment_id', $this->commentID)
            ->where('user_id', \Auth::user()->id)
            ->first();
        }

        if($check != null) {
            return true;
        }

        return false;
    }

    public function isDownVoted() {
        $check = null;

        if (\Auth::check()) {
            $check = CommentsDownVote::where('comment_id', $this->commentID)
            ->where('user_id', \Auth::user()->id)
            ->first();
        }

        if($check != null) {
            return true;
        }
        
        return false;
    }

    public function upVote() {
        if(!\Auth::check()) {
            return redirect('login');
        }

        if($this->isUpvoted()) {
            CommentsUpVote::where('comment_id', $this->commentID)
            ->where('user_id', \Auth::user()->id)
            ->take(1)
            ->delete();

            $this->voted--;
        }elseif($this->isDownVoted()) {
            CommentsDownVote::where('comment_id', $this->commentID)
            ->where('user_id', \Auth::user()->id)
            ->take(1)
            ->delete();

            $upVote = new CommentsUpVote;
            $upVote->user_id = \Auth::user()->id;
            $upVote->comment_id = $this->commentID;
            $upVote->save();

            $this->voted = $this->voted + 2;
        }else{
            $upVote = new CommentsUpVote;
            $upVote->user_id = \Auth::user()->id;
            $upVote->comment_id = $this->commentID;
            $upVote->save();

            $this->voted++;
        }
    }

    public function downVote() {
        if(!\Auth::check()) {
            return redirect('login');
        }

        if($this->isDownvoted()) {
            CommentsDownVote::where('comment_id', $this->commentID)
            ->where('user_id', \Auth::user()->id)
            ->take(1)
            ->delete();

            $this->voted++;
        }elseif($this->isUpVoted()) {
            CommentsUpVote::where('comment_id', $this->commentID)
            ->where('user_id', \Auth::user()->id)
            ->take(1)
            ->delete();

            $upVote = new CommentsDownVote;
            $upVote->user_id = \Auth::user()->id;
            $upVote->comment_id = $this->commentID;
            $upVote->save();

            $this->voted = $this->voted - 2;
        }else{
            $upVote = new CommentsDownVote;
            $upVote->user_id = \Auth::user()->id;
            $upVote->comment_id = $this->commentID;
            $upVote->save();

            $this->voted--;
        }
    }

    public function render()
    {
        return view('livewire.comment.vote',[
            'upVoted' => $this->isUpVoted(),
            'downVoted' => $this->isDownVoted(),
        ]);
    }
}
