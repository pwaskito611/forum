<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\UuidTrait;


class UserReport extends Model
{
    use HasFactory, UuidTrait;

    protected $fillable = [
        'reported_user_id',
        'reporter_id',
        'reason'
    ];

    public $timestamps = false;
    protected $table = 'user_report';
}
