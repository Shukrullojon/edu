<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    static $staff_status = [
        0 => '📦 Archive',
        1 => '✅ Active',
        2 => '🙅‍♂️ Otpuska',
        3 => '🤕 Ill',
    ];

    static $student_status = [
        1 => 'Reception',
        2 => 'First Lesson',
        3 => 'Waiting',
        4 => 'Active',
        5 => 'Frozen',
        6 => 'Left',
        21 => 'Archive',
    ];

    protected $fillable = [
        'email',
        'password',
        'name',
        'surname',
        'phone',
        'series_number',
        'filial_id',
        'status',
        'id_code',
        'interes_cource_id',
        'interes_day_id',
        'interes_time',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function filial()
    {
        return $this->belongsTo(Filial::class);
    }

    public function directions()
    {
        return $this->belongsToMany(Direction::class, 'user_direction', 'user_id', 'direction_id');
    }

    public function langs()
    {
        return $this->belongsToMany(Lang::class, 'user_lang', 'user_id', 'lang_id');
    }

    public function interes_cource(){
        return $this->belongsTo(Cource::class,'interes_cource_id','id');
    }

    public function interes_day(){
        return $this->belongsTo(Day::class,'interes_day_id','id');
    }

    public function group_info()
    {
        return $this->hasOne(GroupStudent::class,'student_id','id')->where('status',1)->orderByDesc('id');
    }
}
