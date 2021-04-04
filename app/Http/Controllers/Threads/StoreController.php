<?php

namespace App\Http\Controllers\Threads;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Thread;
use App\Models\Space;
use App\Http\Traits\Notifications\FollowerUserNotificationTrait;

class StoreController extends Controller
{
    use FollowerUserNotificationTrait;

    public function main(Request $request) {
        $this->validation($request);

        $thread = new Thread;
        $thread->title = $request->title;
        $thread->content = $request->content;
        $thread->image_path = $request->image_path;
        $thread->topic = $request->topic;
        $thread->user_id = \Auth::user()->id;
        $thread->save();

        $this-> sendFollowerUserNotification(\Auth::user()->id, $thread->id, 'membuat diskusi baru berjudul "'.$request->title.'"');

        return redirect('thread/' . $thread->id);
    } 

    public function validation($request) {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'topic' => 'required',
        ]);
    }
}
 