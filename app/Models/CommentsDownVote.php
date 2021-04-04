<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentsDownVote extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_id',
        'user_id'
    ];

    public $timestamps = FALSE;
    protected $table = 'comments_down_vote';
}
