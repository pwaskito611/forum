<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\UuidTrait;

class PersonFollower extends Model
{
    use HasFactory, UuidTrait;

    protected $fillable = [
        'follower_id',
        'followed_id',
    ];

    public $timestamps = FALSE;
    protected $table = 'following_person';
}
