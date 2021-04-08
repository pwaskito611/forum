<?php

namespace App\Http\Controllers\SearchResults;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Thread;
use App\Models\Space; 

class SearchController extends Controller
{  
    public function main(Request $request) {
        $request->search = str_replace('"', "''", $request->search);

        $users = User::whereRaw('name regexp "'. $request->search . '" OR id = "'. $request->search. '"')
        ->take(4)
        ->get();

        $threads = Thread::whereRaw('title regexp "'. $request->search. '"')
        ->with([
            'threadUpVote', 'threadDownVote', 'comment', 'user'
        ])
        ->take(4)
        ->get();

        return view('pages.search-result.search-result',[
            'threads' => $threads,
            'users' => $users,
            'search' => $request->search,
        ]);

    }
}
