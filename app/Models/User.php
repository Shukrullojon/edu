<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property String $name
 * @property String $surname
 * @property String $email
 * @property String $phone
 * @property String $parent_phone
 * @property String $password
 * @property integer $reception_id
 * @property integer $is_payment
 * @property integer $status
 * @property integer $salary
 * @property integer $kpi
 * @property integer $hourly
 * @property integer $add_student
 * @property integer $active_student
 * */

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_code',
        'name',
        'surname',
        'email',
        'phone',
        'parent_phone',
        'password',
        'reception_id',
        'is_payment',
        'status',
        'salary',
        'kpi',
        'hourly',
        'add_student',
        'active_student',
        'start',
        'end',
        'cource_id',
        'day_id',
        'interes_time',
    ];

    public function directions()
    {
        return $this->belongsToMany(Direction::class, 'user_direction', 'user_id', 'direction_id');
    }

    public function langs()
    {
        return $this->belongsToMany(Lang::class, 'user_lang', 'user_id', 'lang_id');
    }

    public function reception(){
        return $this->belongsTo(User::class,'reception_id','id');
    }

    public function cource(){
        return $this->belongsTo(Cource::class,'cource_id','id');
    }

    public function helperDay(){
        return $this->hasMany(Helper::class,'table_id','id')
            ->where('model',Day::class)
            ->where('table',User::class);
    }

    public function helperLang(){
        return $this->hasMany(Helper::class,'table_id','id')
            ->where('model',Lang::class)
            ->where('table',User::class);
    }

    public function groupList(){
        return $this->hasOne(GroupStudent::class,'student_id','id')->orderByDesc('id');
    }

    public function groupAllList(){
        return $this->hasMany(GroupStudent::class,'student_id','id')->orderByDesc('id');
    }

    public function groupLists(){
        return $this->hasMany(GroupStudent::class,'student_id','id')->orderByDesc('id');
    }

    public function sms(){
        return $this->hasMany(Sms::class,'user_id','id')->orderByDesc('id');
    }

    public function event(){
        return $this->hasOne(EventUser::class,'user_id','id')->orderByDesc('id');
    }

    public function events()
    {
        return $this->hasMany(EventUser::class);
    }

    public function pu(){
        return $this->hasMany(PU::class,'user_id','id');
    }

    public function payments(){
        return $this->hasMany(UserPayment::class,'user_id','id')->orderByDesc('id');
    }

    public function likes(){
        return $this->hasMany(UserAttend::class,'student_id','id')->where('like',1);
    }

    public function attend(){
        return $this->hasMany(UserAttend::class,'student_id','id')->orderByDesc('id');
    }

    public function books(){
        return $this->hasMany(UserBook::class,'user_id','id');
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
