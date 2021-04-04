<?php

namespace App\Http\Livewire\Report;

use Livewire\Component;
use App\Models\ReplyCommentReport as Report;

class ReplyCommentReport extends Component
{
    public $commentID;
    public $reason;
    public $additional;

    protected $rules = [
        'reason' => 'required',
    ];

    public function isReported() {
        $check = Report::where('reporter_id', \Auth::user()->id)
        ->where('reported_reply_comment_id', $this->commentID)
        ->first();

        if($check != null) {
            return true;
        }
        return false;
    }

    public function submit() {
        if (!\Auth::check()) {
            return redirect('login');
        }
        
        $this->validate();
        
        if ($this->isReported()) {
            return;
        }

        $report = new Report;
        $report->reported_reply_comment_id = $this->commentID;
        $report->reporter_id = \Auth::user()->id;
        $report->reason = $this->reason;
        $report->additional = $this->additional;
        $report->save();
    }
    public function render()
    {
        return view('livewire.report.reply-comment-report');
    }
}
