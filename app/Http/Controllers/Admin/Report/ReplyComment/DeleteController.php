<?php

namespace App\Http\Controllers\Admin\Report\ReplyComment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReplyComments;

class DeleteController extends Controller
{
    public function main(Request $request) {
        $delete = ReplyComments::find($request->id);
        $delete->delete();

        return \Redirect::back();
    }
}
