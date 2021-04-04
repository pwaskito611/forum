<?php

namespace App\Http\Controllers\Comment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comments;

class UpdateController extends Controller
{
    public function main(Request $request) {

        $validated = $request->validate([
            'thread_id' => 'required',
            'title' => 'required|max:255',
            'comment' => 'required'            
        ]);
        
        $comment = Comments::find($request->id);

        if($comment->user_id != \Auth::user()->id) {
            return;
        }

        $comment->comment = $request->comment;
        $comment->image_path = $request->image_path;
        $comment->save();

        return redirect('thread/' . $comment->thread_id);
    }
}
