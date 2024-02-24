<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property String $name
 * @property String $comment
 * @property Time $time
 * @property String $day
 * @property int $type
 * @property int $user_id
 * @property int $attach_user_id
 * @property int $status
 * */

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [
        'name',
        'comment',
        'time',
        'day',
        'type',
        'user_id',
        'attach_user_id',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function attach_user(){
        return $this->belongsTo(User::class,'attach_user_id','id');
    }

    public function close_user(){
        return $this->belongsTo(User::class,'close_user_id','id');
    }

    public function comments(){
        return $this->hasMany(Comment::class,'model_id','id')->where('model',Task::class);
    }
}
