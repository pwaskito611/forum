<?php

namespace App\Http\Controllers\Admin\Report\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comments;

class ShowController extends Controller
{
    public function main() {
        $comments = Comments::join('comment_report',
        'comment_report.reported_comment_id' , '=', 'comments.id')
        ->paginate(10);

        return view('pages.admin.report.comment.show', [
            'comments' => $comments
        ]);
    }
}
