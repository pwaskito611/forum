<?php

namespace App\Http\Controllers\Comment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Http\Traits\Notifications\FollowerUserNotificationTrait;
use App\Http\Traits\Notifications\ThreadNotificationTrait;
use App\Models\Thread;

class StoreController extends Controller
{
    use FollowerUserNotificationTrait;
    use ThreadNotificationTrait;



    public function main(Request $request) {
        
        $validated = $request->validate([
            'thread_id' => 'required',
            'title' => 'required|max:255',
            'comment' => 'required'            
        ]);

        $comment = new Comments;
        $comment->thread_id = $request->thread_id;
        $comment->comment = $request->comment;
        $comment->image_path = $request->image_path;
        $comment->user_id = \Auth::user()->id;
        $comment->save();

        $title = Thread::find($comment->thread_id);

        $this->sendFollowerUserNotification(\Auth::user()->id,$comment->thread_id,
        'menjawab diskusi yang berjudul "'.$title->title.'"');
        $this->sendThreadNotification($comment->thread_id,\Auth::user()->id,
        'menjawab diskusi yang berjudul "'.$title->title.'"');

        return \Redirect::back();
    }
}
