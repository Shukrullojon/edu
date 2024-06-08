<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupSchedule extends Model
{
    use HasFactory;

    static $schedule_status = [
        0 => '❌ Aniqlanmagan',
        1 => '✅ Aniqlangan',
    ];

    protected $table = 'group_schedules';

    protected $guarded = [];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function direction()
    {
        return $this->belongsTo(Direction::class);
    }

    public function stud()
    {
        return $this->belongsTo(User::class,'student_id','id');
    }
    public function students()
    {
        return $this->hasMany(GroupStudent::class,'group_id','group_id')->orderByDesc('id');
    }

    public function student()
    {
        return $this->belongsTo(User::class,'student_id','id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class,'teacher_id','id');
    }

    public function days()
    {
        return $this->hasMany(GroupSchedule::class,'group_id','group_id')
            ->where('teacher_id',auth()->user()->id)
            ->groupBy('date');
    }
}
