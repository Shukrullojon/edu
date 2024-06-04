<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupStudent extends Model
{
    use HasFactory;

    protected $table = 'group_students';

    protected $guarded = [];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
