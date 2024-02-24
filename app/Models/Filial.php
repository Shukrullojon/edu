<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property String $name
 * @property String $address
 * @property String $phone
 * @property int $status
 * */

class Filial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'status',
        'room_count',
    ];

    protected $table = 'filials';

    public $timestamps = true;

    public function room_cnt(){
        return $this->hasOne(Room::class)->select(DB::raw('count(id) as r_c'));
    }
}
