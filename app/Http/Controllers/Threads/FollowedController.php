<?php

namespace App\Http\Controllers\Threads;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Thread;
use App\Models\ThreadFollower;

class FollowedController extends Controller
{
    public function main() {

        //terjadi bug kalau menggunakan join munngkin karena memeiliki nama colummn yang sama
        //user_id(pada threads, dan following_threads)
        $threads = Thread::whereIn('id', function($query){
            $query  ->select('following_threads.thread_id')
                    ->from('following_threads')
                    ->where('following_threads.user_id', \Auth::user()->id);
        })
        ->with(['threadUpVote', 'threadDownVote', 'user', 'comment'])
        ->Paginate(10);
            
        return view('pages.thread.followed', [
            'threads' => $threads,
        ]);   

    }
}
