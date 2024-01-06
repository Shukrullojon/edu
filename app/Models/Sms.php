<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property String $phone
 * @property integer $type
 * @property String $text
 * @property integer $status
 * @property integer $user_id
 * */


class Sms extends Model
{
    use HasFactory;

    protected $table = 'sms';

    protected $fillable = [
        'user_id',
        'phone',
        'type',
        'text',
        'status',
    ];
}
