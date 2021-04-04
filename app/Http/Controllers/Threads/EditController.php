<?php

namespace App\Http\Controllers\Threads;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Thread;

class EditController extends Controller
{
    public function main(Request $request) {
        $thread = Thread::where('id', $request->id)->first();
 
        if(!\Auth::check()){
            return abort(403);
        }

        if(\Auth::user()->id != $thread->user_id){
            return abort(403);
        }

        return view('pages.thread.edit-thread' ,[
            'thread' => $thread
        ]);
    }
}
