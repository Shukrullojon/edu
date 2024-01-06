<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property String $name
 * @property String $room_id
 * @property int $status
 * */

class RoomTasks extends Model
{
    use HasFactory;

    protected $table = 'room_tasks';

    protected $fillable = [
        'name',
        'filial_id',
        'status',
    ];

    public $timestamps = true;

    public function filial(){
        return $this->belongsTo(Filial::class);
    }

    public function room(){
        return $this->belongsToMany(Room::class);
    }
}
