<?php

namespace App\Http\Controllers\ReplyAnswer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReplyComments;

class StoreController extends Controller
{
    public function main(Request $request) {

        $validated = $request->validate([
            'comment_id' => 'required',
            'comment' => 'required'            
        ]);

        $store = new ReplyComments;
        $store->user_id = \Auth::user()->id;
        $store->comment = $request->comment;
        $store->comment_id = $request->id;
        $store->save();

        return \Redirect::back();
    }
}
