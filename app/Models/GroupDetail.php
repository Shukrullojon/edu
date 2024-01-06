<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $group_id
 * @property int $room_id
 * @property int $teacher_id
 * @property Time $begin_time
 * @property Time $end_time
 * @property int $status
 * @property int $amount
 * @property string $comment
 * */

class GroupDetail extends Model
{
    use HasFactory;

    protected $table = 'group_details';

    protected $fillable = [
        'group_id',
        'room_id',
        'teacher_id',
        'begin_time',
        'end_time',
        'status',
        'comment',
        'amount',
        'type',
    ];
    public function group(){
        return $this->belongsTo(Group::class,'group_id','id');
    }

    public function room(){
        return $this->belongsTo(Room::class,'room_id','id');
    }

    public function teacher(){
        return $this->belongsTo(User::class,'teacher_id','id');
    }

    public function students(){
        return $this->hasMany(GroupStudent::class,'group_id','group_id')->where('status',1);
    }

    public function groupByType(){
        return $this->belongsTo(Group::class,'group_id','id')->whereIn('type',[1,2]);
    }

    public function groupToq(){
        return $this->belongsTo(Group::class,'group_id','id')->whereIn('type',[2]);
    }
}
