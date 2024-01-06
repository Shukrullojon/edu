<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Group $group_id
 * @property Room $student_id
 * @property int $status
 * @property timestamp $closed_at
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * */

class GroupStudent extends Model
{
    use HasFactory;

    protected $table = 'group_student';

    protected $fillable = [
        'group_id',
        'student_id',
        'status',
        'closed_at',
        'created_at',
        'updated_at',
    ];

    public $timestamps = [
        'closed_at',
        'created_at',
        'updated_at',
    ];

    public function student(){
        return $this->belongsTo(User::class,'student_id','id');
    }

    public function group(){
        return $this->belongsTo(Group::class,'group_id','id');
    }

    public function attend(){
        return $this->belongsTo(UserAttend::class,'group_id','group_id')
            ->where('date',date('Y-m-d'));
    }
}
