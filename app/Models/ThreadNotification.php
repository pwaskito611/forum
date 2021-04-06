<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\UuidTrait;

class ThreadNotification extends Model
{
    use HasFactory, UuidTrait;

    protected $fillable = [
        'notification_id',
        'answerer_id',
        'thread_id'
    ];

    public $timestamps = false;
    public $table = 'thread_notification';
}
