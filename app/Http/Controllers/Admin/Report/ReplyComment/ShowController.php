<?php

namespace App\Http\Controllers\Admin\Report\ReplyComment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReplyComments;

class ShowController extends Controller
{
    public function main() {
        $comments = ReplyComments::join('reply_comment_report',
        'reply_comment_report.reported_reply_comment_id' , '=', 'reply_comments.id')
        ->paginate(10);

        return view('pages.admin.report.reply-comment.show', [
            'comments' => $comments
        ]);
    }
}
