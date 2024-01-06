<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $user_id
 * @property int $month
 * @property int $salary
 * @property int $pay_salary
 * @property int $status
 * @property int $type
 * */

class UserPayment extends Model
{
    use HasFactory;

    protected $table = 'user_payment';

    protected $fillable = [
        'user_id',
        'group_id',
        'amount',
        'pay_amount',
        'month',
        'days',
        'status',
        'type',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function group(){
        return $this->belongsTo(Group::class);
    }
}
