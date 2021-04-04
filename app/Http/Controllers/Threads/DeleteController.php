<?php

namespace App\Http\Controllers\Threads;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Thread;

class DeleteController extends Controller
{
    public function main(Request $request) {
        $delete = Thread::find($request->id);

        if ($delete->user_id != \Auth::user()->id) {
            return;
        }
        
        $delete->delete();

        if($request->url !== null) {
            return redirect($request->url);
        }

        return \Redirect::back();
    }
}
