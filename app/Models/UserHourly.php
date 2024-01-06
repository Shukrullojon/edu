<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $user_id
 * @property String $date
 * @property int $pay_amount
 * @property timestamp $start
 * @property timestamp $end
 * */

class UserHourly extends Model
{
    use HasFactory;

    protected $table = 'user_hourly';

    protected $fillable = [
        'user_id',
        'date',
        'pay_amount',
        'start',
        'end',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
