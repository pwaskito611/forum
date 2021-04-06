<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\UuidTrait;

class ThreadDownVote extends Model
{
    use HasFactory, UuidTrait;

    protected $fillable = [
        'thread_id',
        'user_id'
    ];

    protected $table = 'threads_down_vote';
    public $timestamps = FALSE;
}
