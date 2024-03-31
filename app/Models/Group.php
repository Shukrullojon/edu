<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property String $name
 * @property int $type
 * @property Timestamp $start_time
 * @property Cource $cource_id
 * @property Filial $filial_id
 * @property integer $max_student
 * @property integer $max_teacher
 * @property String $color
 * */

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';

    protected $fillable = [
        'name',
        'start_date',
        'start_hour',
        'cource_id',
        'filial_id',
        'lang_id',
        'max_student',
        'max_teacher',
        'status',
        'color',
        'type',
    ];

    public function day_create($type){
        DayPilot::where('model',Group::class)->where('model_id',$this->id)->whereNotIn('day_id',$type)->delete();
        foreach ($type as $key => $t){
            DayPilot::updateOrCreate([
                'model' => Group::class,
                'model_id' => $this->id,
                'day_id' => $t
            ]);
        }
        return true;
    }
    public function cource(){
        return $this->belongsTo(Cource::class);
    }

    public function filial(){
        return $this->belongsTo(Filial::class);
    }

    public function lang()
    {
        return $this->belongsTo(Lang::class,);
    }

    public function detail(){
        return $this->hasMany(GroupDetail::class,'group_id','id')->where('status',1)->orderByDesc('id');
    }

    public function schedules()
    {
        return $this->hasMany(GroupSchedule::class)->where('date',date('Y-m-d'));
    }

    public function detailFirst(){
        return $this->hasOne(GroupDetail::class,'group_id','id')->where('status',1);
    }

    public function student(){
        return $this->hasMany(GroupStudent::class)->orderByDesc('id');
    }

    public function stdCount(){
        return $this->hasOne(GroupStudent::class)
            ->select(DB::raw("count(id) as number"));
    }

    public function teacherCount(){
        return $this->hasOne(GroupDetail::class)
            ->where('status',1)
            ->select(DB::raw("count(id) as number"));
    }

    public function types(){
        return $this->belongsToMany(Day::class, 'day_pilot', 'model_id', 'day_id')
            ->where('model',Group::class)
            ->withTimestamps();
    }

    public function info($schedule_id, $student_id)
    {

        $info = GroupScheduleStudent::where('group_schedule_id',$schedule_id)
            ->where('student_id',$student_id)
            ->first();
        return $info;
    }
}
