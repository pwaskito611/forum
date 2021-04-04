<?php

namespace App\Http\Controllers\Admin\Report\Thread;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\ThreadReport;

class ShowController extends Controller
{
    public function main() {
        $threads = Thread::join('thread_report',
        'thread_report.reported_thread_id' , '=', 'threads.id')
        ->paginate(10);

        return view('pages.admin.report.thread.show', [
            'threads' => $threads
        ]);
    }
}
