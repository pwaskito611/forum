<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\UuidTrait;

class CommentsUpVote extends Model
{
    use HasFactory, UuidTrait;

    protected $fillable = [
        'comment_id',
        'user_id'
    ];

    public $timestamps = FALSE;
    protected $table = 'comments_up_vote';
}
