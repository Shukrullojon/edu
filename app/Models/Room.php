<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property String $name
 * @property String $filial_id
 * @property int $status
 * */

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    protected $fillable = [
        'name',
        'filial_id',
        'status',
    ];

    public $timestamps = true;

    public function filial(){
        return $this->belongsTo(Filial::class);
    }

    public function roomTask(){
        return $this->belongsToMany(RoomTasks::class);
    }

    public function details(){
        return $this->hasMany(GroupDetail::class,'room_id','id')->orderBy('begin_time','ASC');
    }
}
