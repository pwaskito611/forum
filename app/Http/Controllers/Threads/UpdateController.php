<?php

namespace App\Http\Controllers\Threads;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Thread;
use App\Models\Space;

class UpdateController extends Controller
{
    public function main(Request $request) {
        $this->validation($request);

        $thread = Thread::find($request->id);
        
        if(!\Auth::check()){
            return abort(403);
        }

        if(\Auth::user()->id != $thread->user_id){
            return abort(403);
        }
        
        $thread->title = $request->title; 
        $thread->content = $request->content;
        $thread->image_path = $request->image_path;
        $thread->topic = $request->topic;
        $thread->save();

        return redirect(url('thread/' . $thread->id));
    } 

    public function validation($request) {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'topic' => 'required',
        ]);
    }
}
 