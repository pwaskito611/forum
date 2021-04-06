<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\UuidTrait;


class CommentReport extends Model
{
    use HasFactory, UuidTrait;   

    protected $fillable = [
        'reported_comment__id',
        'reporter_id',
        'reason',
        'additional'
    ];  

    public $timestamps = FALSE;
    protected $table = 'comment_report';
}
