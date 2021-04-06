<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\UuidTrait;

class ThreadReport extends Model
{
    use HasFactory, UuidTrait;

    protected $fillable = [
        'reported_thread_id',
        'reporter_id',
        'reason',
        'additional'
    ];

    public $timestamps = false;
    protected $table = 'thread_report';

}
