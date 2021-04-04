<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{
    use HasFactory;

    protected $fillable = [
        'notification_id',
        'user_id',
        'thread_id'
    ];

    protected $table = "user_notification";
    public $timestamps = FALSE;
}
