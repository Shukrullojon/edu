<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property String $name
 * @property String $address
 * @property String $phone
 * @property int $status
 * */

class Filial extends Model
{
    use HasFactory;

    protected $table = 'filials';

    protected $fillable = [
        'name',
        'address',
        'phone',
        'status',
    ];

    public $timestamps = true;
}
