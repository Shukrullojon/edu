<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupStudent extends Model
{
    use HasFactory;

    static $group_student_status = [
        1 => '✅ Active',
        0 => '❌ Archive',
    ];


    protected $table = 'group_students';

    protected $guarded = [];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class,'student_id','id');
    }
}
