<?php

namespace App\Http\Controllers\Admin\Report\Thread;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\ThreadReport;

class DetailController extends Controller
{
    public function main(Request $request) {
        
        $items = ThreadReport::join('users',
        'thread_report.reporter_id', '=', 'users.id')
        ->where('reported_thread_id', $request->id)
        ->paginate(10);

        return view('pages.admin.report.thread.detail', [
            'items' => $items
        ]);
    }
}
