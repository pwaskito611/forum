<?php

namespace App\Http\Controllers\Admin\Report\ReplyComment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReplyCommentReport;

class DetailController extends Controller
{
    public function main(Request $request) {
        $items = ReplyCommentReport::join('users',
        'reply_comment_report.reporter_id', '=', 'users.id')
        ->where('reported_reply_comment_id', $request->id)
        ->paginate(10);

        return view('pages.admin.report.reply-comment.detail', [
            'items' => $items
        ]);
    }
}
