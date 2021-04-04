<?php

namespace App\Http\Controllers\SearchResults;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Thread;
use App\Models\Space; 

class ThreadController extends Controller
{
    public function main(Request $request) {

        $threads = Thread::whereRaw('title regexp "'. $request->search. '"')
        ->with([
            'threadUpVote', 'threadDownVote', 'comment', 'user'
        ])
        ->paginate(10);  

        return view('pages.search-result.thread',[
            'threads' => $threads,
            'search' => $request->search,

        ]);

    }
}
