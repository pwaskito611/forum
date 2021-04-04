<?php

namespace App\Http\Livewire\Comment;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Comments;

class Create extends Component
{
    use WithFileUploads;

    public $file = "";
    public $path = "";
    public $comment;
    public $threadID;

    

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
        return view('livewire.comment.create');
    }
}
