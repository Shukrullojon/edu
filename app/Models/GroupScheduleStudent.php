<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupScheduleStudent extends Model
{
    use HasFactory;

    protected $table = 'group_schedule_students';

    protected $guarded = [];

    public function schedule()
    {
        return $this->belongsTo(GroupSchedule::class,'group_schedule_id','id');
    }
}
