<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property String $question
 * @property String $a
 * @property String $b
 * @property String $c
 * @property String $d
 * @property integer $answer
 * @property integer $p_c_id
 * */

class PT extends Model
{
    use HasFactory;

    protected $table = 'p_t';

    protected $fillable = [
        'question',
        'a',
        'b',
        'c',
        'd',
        'answer',
        'p_c_id',
    ];

    public function pc(){
        return $this->belongsTo(PC::class,'p_c_id','id');
    }
}
