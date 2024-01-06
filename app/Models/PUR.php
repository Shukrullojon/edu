<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $p_u_id
 * @property integer $p_t_id
 * @property integer $answer
 * */

class PUR extends Model
{
    use HasFactory;

    protected $table = 'p_u_r';

    protected $fillable = [
        'p_u_id',
        'p_t_id',
        'answer',
    ];

    public function pt(){
        return $this->belongsTo(PT::class,'p_t_id','id');
    }
}
