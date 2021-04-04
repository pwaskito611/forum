<?php

namespace App\Http\Livewire\Comment;

use Livewire\Component;
use App\Models\ReplyComments;

class ReplyComment extends Component
{
    public $commentID;


    public function render()
    {
        $reply = ReplyComments::where('comment_id', $this->commentID)
        ->with(['user'])
        ->paginate(10);

        return view('livewire.comment.reply-comment', [
            'reply' => $reply
        ]);
    }
}
 