<?php

namespace App\Http\Controllers\Admin\Report\Thread;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\ThreadReport;

class DeleteController extends Controller
{
    public function main(Request $request) {
        $delete = Thread::find($request->id);
        $delete->delete();

        return \Redirect::back();
    }
}
