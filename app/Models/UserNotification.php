<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\UuidTrait;

class UserNotification extends Model
{
    use HasFactory, UuidTrait;

    protected $fillable = [
        'notification_id',
        'user_id',
        'thread_id'
    ];

    protected $table = "user_notification";
    public $timestamps = FALSE;
}
