<?php

namespace App\Http\Controllers\Threads;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateThreadController extends Controller
{
    public function main() {
        return view('pages.thread.create-thread');
    }
}
 