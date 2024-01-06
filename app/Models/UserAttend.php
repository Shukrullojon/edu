<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $teacher_id
 * @property int $group_id
 * @property int $student_id
 * @property time $date
 * @property int $attend
 * @property int $homework
 * */

class UserAttend extends Model
{
    use HasFactory;

    public $table = 'user_attend';

    protected $fillable = [
        'teacher_id',
        'group_id',
        'student_id',
        'date',
        'attend',
        'homework',
        'like',
    ];

    public function group(){
        return $this->belongsTo(Group::class);
    }

    public function teacher(){
        return $this->belongsTo(User::class,'teacher_id','id');
    }

    public function student(){
        return $this->belongsTo(User::class,'student_id','id');
    }

    public function comment(){
        return $this->hasOne(Comment::class,'model_id','id')->where('model',UserAttend::class);
    }
}
