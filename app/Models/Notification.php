<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\UuidTrait;

class Notification extends Model
{
    use HasFactory, UuidTrait;

    protected $fillable = [
        'viewer_id',
        'object',
        'is_readed'
    ];

    public $table = "notification";


    public function threadNotification()
    {
        return $this->hasOne(ThreadNotification::class, 'notification_id');
    }

    public function UserNotification()
    {
        return $this->hasOne(UserNotification::class, 'notification_id');
    }
}
