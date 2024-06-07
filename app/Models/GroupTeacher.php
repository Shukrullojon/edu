<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupTeacher extends Model
{
    use HasFactory;

    protected $table = 'group_teachers';

    protected $guarded = [];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class,'teacher_id','id');
    }

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function direction()
    {
        return $this->belongsTo(Direction::class);
    }
}
