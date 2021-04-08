<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\User;

class TopicController extends Controller
{
    public function main($topic) {
        $topic = str_replace("-"," ", $topic);

        $threads = Thread::with(['threadUpVote', 'threadDownVote', 'user', 'comment'])
            ->orderBy('created_at', 'desc')
            ->where('topic', $topic)
            ->simplePaginate(10);
        
        
            return view('pages.home', [
            'threads' => $threads,
        ]);   
    }
}
