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

class UserMonth extends Model
{
    use HasFactory;

    protected $table = 'user_month';

    protected $fillable = [
        'user_id',
        'month',
        'salary',
        'pay_salary',
        'status',
        'type',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
