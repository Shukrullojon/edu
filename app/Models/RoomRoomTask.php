<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property String $room_id
 * @property String $room_tasks_id
 * */

class RoomRoomTask extends Model
{
    use HasFactory;

    protected $table = 'room_room_tasks';

    protected $fillable = [
        'room_id',
        'room_tasks_id',
    ];
}
