<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyCommentReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'reported_reply_comment__id',
        'reporter_id',
        'reason',
        'additional'
    ];  

    public $timestamps = FALSE;
    protected $table = 'reply_comment_report';
}
