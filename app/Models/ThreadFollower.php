<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThreadFollower extends Model
{
    use HasFactory;

    protected $fillable = [
        'thread_id',
        'user_id',
    ];  

    public $timestamps = FALSE;
    protected $table = 'following_threads';
}
