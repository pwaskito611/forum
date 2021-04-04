<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'reported_comment__id',
        'reporter_id',
        'reason',
        'additional'
    ];  

    public $timestamps = FALSE;
    protected $table = 'comment_report';
}
