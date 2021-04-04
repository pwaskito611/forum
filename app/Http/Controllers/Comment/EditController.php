<?php

namespace App\Http\Controllers\Comment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comments;

class EditController extends Controller
{
    public function main(Request $request) {
        $comment = Comments::find($request->id);

        if(\Auth::user()->id !== $comment->user_id) {
            return abort(403);
        }

        return view('pages.comment.edit', [
            'comment' => $comment
        ]);
    }
}
