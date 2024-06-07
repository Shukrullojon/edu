<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    static $group_status = [
        1 => '🆕 New Group',
        2 => '✅ Open Group',
        3 => '🔐 Close Group',
    ];

    protected $table = 'groups';

    protected $guarded = [];

    public function filial()
    {
        return $this->belongsTo(Filial::class);
    }

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function cource()
    {
        return $this->belongsTo(Cource::class);
    }

    public function students()
    {
        return $this->hasMany(GroupStudent::class, 'group_id','id')->orderByDesc('status');
    }

    public function teachers()
    {
        return $this->hasMany(GroupTeacher::class,'group_id','id');
    }

    public function lang()
    {
        return $this->belongsTo(Lang::class);
    }
}
