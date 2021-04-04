<?php

namespace App\Http\Livewire\Report;

use Livewire\Component;
use App\Models\ThreadReport as Report;

class ThreadReport extends Component
{
    public $threadID;
    public $reason;
    public $additional;

    protected $rules = [
        'reason' => 'required',
    ];

    public function isReported() {
        $check = Report::where('reporter_id', \Auth::user()->id)
        ->where('reported_thread_id', $this->threadID)
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
        $report->reported_thread_id = $this->threadID;
        $report->reporter_id = \Auth::user()->id;
        $report->reason = $this->reason;
        $report->additional = $this->additional;
        $report->save();

    }

    public function render()
    {
        return view('livewire.report.thread-report');
    }
}
