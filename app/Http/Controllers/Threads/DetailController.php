<?php

namespace App\Http\Controllers\Threads;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Thread;
use App\Models\Comments;

class DetailController extends Controller
{
    public function main($id) {
        $thread = Thread::where('id', $id)
        ->with(['threadUpvote', 'threadDownVote' , 'user', 'comment'])
        ->first();

        $comments = Comments::where('thread_id', $id)
        ->with(['commentUpvote', 'commentDownVote', 'user'])
        //->join
        ->paginate(10);
        
        return view('pages.thread.thread-detail',[
            'thread' => $thread,
            'comments' => $comments,
        ]);
    }
}
