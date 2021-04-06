<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\UuidTrait;

class ThreadFollower extends Model
{
    use HasFactory, UuidTrait;

    protected $fillable = [
        'thread_id',
        'user_id',
    ];  

    public $timestamps = FALSE;
    protected $table = 'following_threads';
}
