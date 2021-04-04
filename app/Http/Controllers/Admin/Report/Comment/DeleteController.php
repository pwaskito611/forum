<?php

namespace App\Http\Controllers\Admin\Report\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comments;

class DeleteController extends Controller
{
    public function main(Request $request) {
        $delete = Comments::find($request->id);
        $delete->delete();

        return \Redirect::back();
    }
}
