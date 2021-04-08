<?php

namespace App\Http\Controllers\Admin\Report\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommentReport;

//class for not follow up report
class IgnoreController extends Controller
{
    public function main(Request $request) {
        CommentReport::where('reported_comment_id', $request->id)->delete();

        return \Redirect::back();
    }
}
