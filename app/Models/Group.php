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
        'type',
        'start_date',
        'start_hour',
        'cource_id',
        'filial_id',
        'max_student',
        'max_teacher',
        'status',
        'color',
    ];

    public function cource(){
        return $this->belongsTo(Cource::class);
    }

    public function filial(){
        return $this->belongsTo(Filial::class);
    }

    public function detail(){
        return $this->hasMany(GroupDetail::class,'group_id','id')->where('status',1)->orderByDesc('id');
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
}
