<?php

namespace App\Http\Livewire\Comment;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Comments;

class Edit extends Component
{

    use WithFileUploads;

    public $file = "";
    public $path = "";
    public $comment;
    public $commentID;
    public $image_path;
    

    public function updated() {
        if($this->file != "") {
            $this->validate([
                'file' => 'image',
            ]);
                
            $store = $this->file->store('public/asset');
            $this->path = 'storage/' . substr($store, 7);

        }
    }

    public function mount() {
        if($this->image_path != null) {
            $this->path = $this->image_path;
        }
    }

    public function render()
    {
        return view('livewire.comment.edit');
    }
}
  