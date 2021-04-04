<?php

namespace App\Http\Controllers\Admin\Report\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommentReport;

class DetailController extends Controller
{
    public function main(Request $request) {
        $items = CommentReport::join('users',
        'comment_report.reporter_id', '=', 'users.id')
        ->where('reported_comment_id', $request->id)
        ->paginate(10);

        return view('pages.admin.report.comment.detail', [
            'items' => $items
        ]);
    }
}
