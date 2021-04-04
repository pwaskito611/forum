<?php

namespace App\Http\Livewire\Thread;

use Livewire\Component;
use Livewire\WithFileUploads; 

class Edit extends Component
{
    use WithFileUploads;

    public $threadID;
    public $title;
    public $content;
    public $file = "";
    public $path; 
    public $topic;
    

    public function updated() {
        if($this->file != "") {
            $this->validate([
                'file' => 'image',
            ]);
                
            $store = $this->file->store('public/asset');
            $this->path = 'storage/' . substr($store, 7);
        }
    }
    
    public function render()
    {
        return view('livewire.thread.edit');
    }
}
