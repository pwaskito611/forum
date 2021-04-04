<?php

namespace App\Http\Livewire\Thread;

use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $file = "";
    public $path = "";
    public $content; 

 
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
        return view('livewire.thread.create');
    }
}
