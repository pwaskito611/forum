<?php

namespace App\Http\Controllers\Admin\Report\Thread;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\ThreadReport;

class IgnoreController extends Controller
{
    public function main(Request $request) {
        ThreadReport::where('reported_thread_id', $request->id)->delete();

        return \Redirect::back();
    }
}
