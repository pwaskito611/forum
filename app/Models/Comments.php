<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\UuidTrait;

class Comments extends Model
{
    use HasFactory, UuidTrait;

    protected $fillable = [
        'thread_id',
        'user_id',
        'image_path',
        'comment',
    ];

    protected $table = "comments";


    public function commentUpVote()
    {
        return $this->hasMany(CommentsUpVote::class, 'comment_id');
    }

    public function commentDownVote()
    {
        return $this->hasMany(CommentsDownVote::class, 'comment_id');
    }

    public function ReplyComments() {
        return $this->hasMany(ReplyComments::class, 'comment_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
