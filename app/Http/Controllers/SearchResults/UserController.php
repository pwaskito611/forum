<?php

namespace App\Http\Controllers\SearchResults;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Thread;
use App\Models\Space; 

class UserController extends Controller
{
    public function main(Request $request) {

        $users = User::whereRaw('name regexp "'. $request->search . '"')
        ->paginate(10);

        return view('pages.search-result.user',[
            'users' => $users,
            'search' => $request->search,
        ]);
  
    }  
}
