<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\UuidTrait;

class ReplyComments extends Model
{
    use HasFactory, UuidTrait;

    protected $fillable = [
        'comment_id',
        'user_id',
        'comment',
        'image_path'
    ];


    protected $table = 'reply_comments';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
}
