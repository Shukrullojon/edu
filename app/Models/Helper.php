<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Helper extends Model
{
    use HasFactory;

    protected $table = 'helpers';

    protected $fillable = [
        'model',
        'model_id',
        'table',
        'table_id',
    ];

    public function day(){
        return $this->belongsTo(Day::class,'model_id','id');
    }

    public function lang(){
        return $this->belongsTo(Lang::class,'model_id','id');
    }
}
