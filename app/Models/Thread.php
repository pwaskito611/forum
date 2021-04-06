<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\UuidTrait;

class Thread extends Model
{
    use HasFactory;
    use SoftDeletes;
    use UuidTrait;
    
    protected $fillable = [
        'user_id',
        'space',
        'title',
        'image_path',
        'content',
    ];

    protected $table = 'threads';

    public function threadUpVote()
    {
        return $this->hasMany(ThreadUpVote::class, 'thread_id');
    }

    public function threadDownVote()
    {
        return $this->hasMany(ThreadDownVote::class, 'thread_id');
    }

    public function comment()
    {
        return $this->hasMany(Comments::class, 'thread_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }



}
