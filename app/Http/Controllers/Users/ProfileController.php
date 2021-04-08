<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\User;
use App\Models\UserFollower;
  
class ProfileController extends Controller
{
    public function main($id) {
        $items = Thread::with([
            'threadUpVote', 'threadDownVote', 'comment'
        ])
        ->where('user_id', $id)
        ->orderBy('created_at', 'desc')
        ->paginate(5);

        $user = User::where('id', $id)->first();

        return view('pages.users.profile', [
            'items' => $items,
            'user' => $user,
        ]);
    }
}
