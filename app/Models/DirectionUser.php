<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectionUser extends Model
{
    use HasFactory;

    protected $table = 'user_direction';

    protected $fillable = [
        'direction_id',
        'user_id',
    ];
}
