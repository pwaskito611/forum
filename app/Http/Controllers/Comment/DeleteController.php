<?php

namespace App\Http\Controllers\Comment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comments;

class DeleteController extends Controller
{
    public function main(Request $request) {
        $delete = Comments::find($request->id);
        
        if ($delete->user_id != \Auth::user()->id) {
            return \Redirect::back();
        }

        $delete->delete();

        return \Redirect::back();
    }
}
