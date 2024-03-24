<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupSchedule extends Model
{
    use HasFactory;

    protected $table = 'group_schedules';

    protected $guarded = [];

    public function plan_teacher()
    {
        return $this->belongsTo(User::class,'plan_teacher_id','id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class,'teacher_id','id');
    }

    public function direction()
    {
        return $this->belongsTo(Direction::class);
    }
}
