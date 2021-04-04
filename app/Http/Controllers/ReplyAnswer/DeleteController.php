<?php

namespace App\Http\Controllers\ReplyAnswer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReplyComments;

class DeleteController extends Controller
{
    public function main(Request $request) {
        $delete = ReplyComments::find($request->id);

        if($delete->user_id != \Auth::user()->id) {
            return;
        }

        $delete->delete();

        return \Redirect::back();
    }
}
