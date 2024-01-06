<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public $active_month;
    public $active_year;

    public function __construct()
    {
        $this->active_month = date('m');
        $this->active_year = date('Y');
    }

    public function createIdCode($user,$filial_id)
    {
        $active_year = substr($this->active_year,2,2);

        $user = User::find($user->id);
        $user->id_code = $filial_id.$active_year.$this->active_month.$user->id;
        $user->save();
    }


}
