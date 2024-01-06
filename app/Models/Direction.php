<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property String $name
 * */

class Direction extends Model
{
    use HasFactory;

    protected $table = 'directions';

    protected $fillable = [
        'name',
    ];
}
