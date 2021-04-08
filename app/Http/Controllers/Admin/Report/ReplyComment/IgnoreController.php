<?php

namespace App\Http\Controllers\Admin\Report\ReplyComment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReplyCommentReport;

//class for not follow up report
class IgnoreController extends Controller
{
    public function main(Request $request) {
        ReplyCommentReport::where('reported_reply_comment_id', $request->id)->delete();

        return \Redirect::back();
    }
}
