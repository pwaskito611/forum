<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\User;

class HomeController extends Controller
{
    public function main() {
        $threads = Thread::with(['threadUpVote', 'threadDownVote', 'user', 'comment'])
            ->orderBy('created_at', 'desc')
            ->simplePaginate(10);
        
        
            return view('pages.home', [
            'threads' => $threads,
        ]);   
    }
}
